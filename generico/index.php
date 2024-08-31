<?php include("header.php"); ?>

    <div class="container text-center mt-3 mb-5">

        <!-- Alerta criado para informar a quantidade de produtos -->
        <div class="alert alert-info text-center" style="width:50%; margin:auto;">
            Há <strong>X</strong> produtos cadastrados em nosso sistema!
        </div>
        <br>

        <!-- Formulário para aplicar filtros aos produtos -->
        <form name="formFiltro" action="index.php" method="GET" style="width:50%; margin:auto;">
            <select class="form-select" name="filtroProduto" required>
                <option value="todos">Visualizar todos os Produtos</option>
                <option value="disponivel">Visualizar apenas Produtos Disponíveis</option>
                <option value="vendido">Visualizar apenas Produtos Vendidos</option>
            </select><br>
            <button type="submit" class="btn btn-primary" style="float:right">
                Filtrar Produtos
            </button>
        </form>

        <!-- Início da primeira linha da GRID -->
        <div class="row mt-5">
            <!-- Início da primeira coluna da GRID -->
            <div class="col-sm-3">
                <!-- Início do Card para exibição do produto-->
                <div class="card" style="width:100%; height:100%;">
                    <img class="card-img-top" src="img_avatar1.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Nome do Produto</h4>
                        <p class="card-text">Preço do Produto</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width:100%; height:100%;">
                    <img class="card-img-top" src="img_avatar1.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Nome do Produto</h4>
                        <p class="card-text">Preço do Produto</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width:100%; height:100%;">
                    <img class="card-img-top" src="img_avatar1.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Nome do Produto</h4>
                        <p class="card-text">Preço do Produto</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style="width:100%; height:100%;">
                    <img class="card-img-top" src="img_avatar1.png" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Nome do Produto</h4>
                        <p class="card-text">Preço do Produto</p>
                        <a href="#" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

<?php include("footer.php"); ?>

?>