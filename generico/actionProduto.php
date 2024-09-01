<?php include("header.php"); ?>

<?php

    //Bloco para declaração das variáveis
    $fotoProduto = $nomeProduto= $descricaoProduto = $categoriaProduto = $valorProduto = $condicaoProduto = "";
    $dataCadastroProduto = date('Y-m-d'); //Utiliza a função date para pegar a data no formato AAAA/MM/DD
    $horaCadastroProduto = date('H:i:s'); //Utiliza a função date para pegar as horas no formato HH:MM:SS
    $erroPreenchimento = false; //Variável para controle de erros durante o preenchimento do formulário

    //Verifica o método de envio do FORM
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Utiliza a função empty para verificar se o campo nomeProduto(form) está vazio
        if(empty($_POST["nomeProduto"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>NOME</strong> é obrigatório!</div>";
            $erroPreenchimento = true; //Em caso de erro, a variável passa a ser verdadeira
        } else{
            $nomeProduto = filtrar_entrada($_POST["nomeProduto"]); //Caso não hajam erros, a variável PHP recebe o valor que foi preenchido no formulário
        }

        //Validação do campo descricaoProduto
        if(empty($_POST["descricaoProduto"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>DESCRIÇÃO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $descricaoProduto = filtrar_entrada($_POST["descricaoProduto"]);
        }

        //Validação do campo categoriaProduto
        if(empty($_POST["categoriaProduto"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>CATEGORIA</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $categoriaProduto = filtrar_entrada($_POST["categoriaProduto"]);
        }

        //Validação do campo valorProduto
        if(empty($_POST["valorProduto"])){
            echo "<div class='alert alert-warning text-center'>O campo <strong>VALOR DO PRODUTO</strong> é obrigatório!</div>";
            $erroPreenchimento = true;
        } else{
            $valorProduto = filtrar_entrada($_POST["valorProduto"]);
        }

        //Validação do campo condicaoProduto
        if(empty($_POST["condicaoProduto"])){
            $condicaoProduto = "Usado";
        } else{
            $condicaoProduto = "Novo";
        }

        //Início da validação da Foto do Usuário
        $diretorio    = "img/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoProduto  = $diretorio . basename($_FILES["fotoProduto"]["name"]); // img/ana.jpg
        $erroUpload   = false; //Variável criada para verificar se houve sucesso no upload
        $tipoDaImagem = strtolower(pathinfo($fotoProduto, PATHINFO_EXTENSION));  //Pega tipo do arquivo

        //Verifica se o tamanho da imagem é maior do que ZERO
        if ($_FILES["fotoProduto"]["size"] != 0){ //Usa a propriedade "size" para verificar o tamanho 

            if($_FILES["fotoProduto"]["size"] > 5000000){ //Verifica o tamanho em BYTES (5MB, nesse caso)
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
                if(!move_uploaded_file($_FILES["fotoProduto"]["tmp_name"], $fotoProduto)){
                    echo "<div class='alert alert-warning text-center'>Erro ao tentar<strong>MOVER O ARQUIVO para o diretório $diretorio</strong>!</div>";
                    $erroUpload = true;
                }
            }
        }
        else{
            echo "<div class='alert alert-warning text-center'>
            Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
            $erroUpload = true;
        }
        
        //Se NÃO houver erro de preenchimento (caso a variável de controle esteja com o valor 'false')
        if(!$erroPreenchimento && !$erroUpload){
            echo "
                <div class='container mt-3'>
                    <div class='container mt-3 text-center'>
                        <img src='$fotoProduto' style='width: 150px;'>
                    </div>
                    <div class='table-responsive'>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeProduto</td>
                            </tr>
                            <tr>
                                <th>DESCRIÇÃO</th>
                                <td>$descricaoProduto</td>
                            </tr>
                            <tr>
                                <th>CATEGORIA</th>
                                <td>$categoriaProduto</td>
                            </tr>
                            <tr>
                                <th>VALOR DO PRODUTO</th>
                                <td>$valorProduto</td>
                            </tr>
                            <tr>
                                <th>CONDIÇÃO</th>
                                <td>$condicaoProduto</td>
                            </tr>
                        </table>
                    </div>
                </div>
            ";
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