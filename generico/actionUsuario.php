<?php include("header.php"); ?>

<?php

    //Bloco para declaração das variáveis
    $fotoUsuario = $nomeUsuario = $cidadeUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";
    $dataCadastroUsuario = date('Y-m-d'); //Utiliza a função date para pegar a data no formato AAAA/MM/DD
    $horaCadastroUsuario = date('H:i:s'); //Utiliza a função date para pegar as horas no formato HH:MM:SS
    $erroPreenchimento = false; //Variável para controle de erros durante o preenchimento do formulário

    //Verifica o método de envio do FORM
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Utiliza a função empty para verificar se o campo nomeUsuario (form) está vazio
        if(empty($_POST["nomeUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
            $erroPreenchimento = true; //Em caso de erro, a variável passa a ser verdadeira
        } else{
            $nomeUsuario = filtrar_entrada($_POST["nomeUsuario"]); //Caso não hajam erros, a variável PHP recebe o valor que foi preenchido no formulário
            //Utiliza a função preg_match() para verificar se há somente letras
            if(!preg_match('/^[\p{L} ]+$/u', $nomeUsuario)){
                echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> deve conter somente LETRAS!</div>";
                $erroPreenchimento = true; //Em caso de erro, a variável passa a ser verdadeira
            }
        }

        //Validação do campo cidadeUsuario
        if(empty($_POST["cidadeUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>CIDADE</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $cidadeUsuario = filtrar_entrada($_POST["cidadeUsuario"]);
        }

        //Validação do campo telefoneUsuario
        if(empty($_POST["telefoneUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $telefoneUsuario = filtrar_entrada($_POST["telefoneUsuario"]);
        }

        //Validação do campo emailUsuario
        if(empty($_POST["emailUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $emailUsuario = filtrar_entrada($_POST["emailUsuario"]);
        }

        //Validação do campo senhaUsuario
        if(empty($_POST["senhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $senhaUsuario = md5(filtrar_entrada($_POST["senhaUsuario"]));
        }

        //Validação do campo confirmarSenhaUsuario
        if(empty($_POST["confirmarSenhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $confirmarSenhaUsuario = md5(filtrar_entrada($_POST["confirmarSenhaUsuario"]));
            if($senhaUsuario != $confirmarSenhaUsuario){
                echo "<div class='alert alert-warning text-center'>As senhas informadas são <strong>DIFERENTES</strong>!</div>";
                $erroPreenchimento = true;
            }
        }

        //Início da validação da Foto do Usuário
        $diretorio    = "img/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoUsuario  = $diretorio . basename($_FILES["fotoUsuario"]["name"]); // img/ana.jpg
        $erroUpload   = false; //Variável criada para verificar se houve sucesso no upload
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION));  //Pega tipo do arquivo

        //Verifica se o tamanho da imagem é maior do que ZERO
        if ($_FILES["fotoUsuario"]["size"] != 0){ //Usa a propriedade "size" para verificar o tamanho 

            if($_FILES["fotoUsuario"]["size"] > 5000000){ //Verifica o tamanho em BYTES (5MB, nesse caso)
                echo "<div class='alert alert-warning text-center'>A foto não pode ser <strong>maior</strong> do que 5MB!</div>";
                $erroUpload = true;
            }

            //Cria o conjunto de imagens aceitos pelo campo foto do formulário 
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                echo "<div class='alert alert-warning text-center'>A foto precisa estar nos formatos <strong>JPG, JPEG, PNG ou WEBP</strong>!</div>";
                $erroUpload = true;
            }   

            if($erroUpload){
                echo "<div class='alert alert-warning text-center'>Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
                $erroUpload = true;
            }
            else{
                //A função seguinte é responsável por mover o arquivo par ao diretório definido (img/)
                if(!move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $fotoUsuario)){
                    echo "<div class='alert alert-warning text-center'>Erro ao tentar<strong>MOVER O ARQUIVO para o diretório $diretorio</strong>!</div>";
                    $erroUpload = true;
                }
            }
        }
        else{
            echo "<div class='alert alert-warning text-center'>Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
            $erroUpload = true;
        }
        
        //Se NÃO houver erro de preenchimento (caso a variável de controle esteja com o valor 'false')
        if(!$erroPreenchimento && !$erroUpload){

            $inserirUsuario = "INSERT INTO Usuarios (fotoUsuario, nomeUsuario, cidadeUsuario, telefoneUsuario, emailUsuario, senhaUsuario, dataCadastroUsuario, horaCadastroUsuario)
                                VALUES ('$fotoUsuario', '$nomeUsuario', '$cidadeUsuario', '$telefoneUsuario', '$emailUsuario', '$senhaUsuario', '$dataCadastroUsuario', '$horaCadastroUsuario')";

            //Inclui o código conexaoBD.php para utilizar a conexão com a base
            include("conexaoBD.php");
            
            //Utiliza a função mysqli_query para executar a query na base de dados
            if (mysqli_query($conn, $inserirUsuario)){
                echo "
                    <div class='alert alert-success text-center'>Usuário cadastrado com sucesso!</div>
                    <div class='container mt-3'>
                        <div class='container mt-3 text-center'>
                            <img src='$fotoUsuario' style='width: 150px;'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nomeUsuario</td>
                                </tr>
                                <tr>
                                    <th>CIDADE</th>
                                    <td>$cidadeUsuario</td>
                                </tr>
                                <tr>
                                    <th>TELEFONE</th>
                                    <td>$telefoneUsuario</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>$emailUsuario</td>
                                </tr>
                                <tr>
                                    <th>SENHA</th>
                                    <td>$senhaUsuario</td>
                                </tr>
                                <tr>
                                    <th>CONFIRMAR SENHA</th>
                                    <td>$confirmarSenhaUsuario</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                ";
            } //Fim do if do mysqli_query
            else {
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar usuário!</div>" . mysqli_error($conn) . "<br>" . $inserirUsuario;
            }
        }

    }

    //Função para filtrar as entradas de dados do formulário para evitar SQL Injection
    function filtrar_entrada($dado){
        $dado = trim($dado); //Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove as barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML

        return($dado); //Retorna o dado já filtrado
    }

?>

<?php include("footer.php");?>