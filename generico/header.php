<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Genérico</title>

    <!-- Úlitima versão compilada e minimizada CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Última versão compilada JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CDNs para Máscaras JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Script para Máscaras do Formulário -->
    <script>
        $(document).ready(function(){
            $("#telefoneUsuario").mask("(00) 00000-0000");
        });
    </script>

</head>
<body>

    <!-- Container de Logotipo do Sistema -->
    <div class="container-fluid text-center">
        <a href="index.php" title="Retornar à Página Inicial">
            <img src="img/logo.png" width="100">
        </a>
        <h1>Genérico - Sistema Web para Vendas</h1>
    </div>

    <!-- Barra de Navegação do Sistema -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" title="Ir para a Página Inicial">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formProduto.php" title="Cadastrar Produto">Cadastrar Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formLogin.php" title="Acessar o Sistema">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container PRINCIPAL do Sistema-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">