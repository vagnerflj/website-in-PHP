<?php include("header.php") ?>

    <div class="container-fluid text-center">

        <h2>Cadastro de Produto:</h2>

        <div class="d-flex justify-content-center mb-3">

            <div class="row">

                <div class="col-sm-12">

                    <form action="actionProduto.php" class="was-validated" method="POST" enctype="multipart/form-data">

                        <div class="form-floating mb-3 mt-3">
                            <input type="file" class="form-control" id="fotoProduto" name="fotoProduto" required>
                            <label for="fotoProduto" class="form-label">Foto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="nomeProduto" placeholder="Informe o nome do Produto" name="nomeProduto" required>
                            <label for="nomeProduto" class="form-label">Nome do Produto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <textarea class="form-control" id="descricaoProduto" placeholder="Informe uma descrição do Produto" name="descricaoProduto" required></textarea>
                            <label for="descricaoProduto" class="form-label">Descrição do Produto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <select class="form-select" id="categoriaProduto" name="categoriaProduto" required>
                                <option value="alimentos">Alimentos</option>
                                <option value="eletronicos">Eletrônicos</option>
                                <option value="vestuario">Vestuário</option>
                            </select>
                            <label for="categoriaProduto" class="form-label">Categoria:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="valorProduto" placeholder="Informe o valor do Produto" name="valorProduto" required>
                            <label for="valorProduto" class="form-label">Valor do Produto:</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="condicaoProduto" name="condicaoProduto" value="yes" checked>
                            <label class="form-check-label" for="condicaoProduto">Produto novo</label>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
       
    </div>

<?php include("footer.php") ?>