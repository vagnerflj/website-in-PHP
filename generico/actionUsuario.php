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
                echo "<div class='alert alert-warning text-center'>
                As senhas informadas são<strong>DIFERENTES</strong>!</div>";
                $erroPreenchimento = true;
            }
        }

        //Se NÃO houver erro de preenchimento (caso a variável de controle esteja com o valor 'false')
        if(!$erroPreenchimento){
            echo "
                <div class='container mt-3'>
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