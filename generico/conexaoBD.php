<?php

    $servidorBD = "localhost"; //Servidor no qual o BD está hospedado
    $usuarioBD  = "root"; //Usuario que fará acesso ao banco de dados
    $senhaBD    = "root"; //Senha do usuário que fará acesso ao banco de dados
    $nomeBD     = "generico"; //Nome da Base de Dados

    //Cria varíavel booleana para verificar o status da conexão
    $conn       = mysqli_connect($servidorBD, $usuarioBD, $senhaBD, $nomeBD);

    //Verifica se houve algum erro ao estabelecer a conexão com a base de dados e exibe mensagem caso sim
    if(!$conn){
        die ("<p>Erro ao tentar conectar à base de dados $nomeBD</p>" . mysqli_error($conn));
    }



?>