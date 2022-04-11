<?php
    require_once '../../../config.php';
    require_once '../../actions/product.php';
    require_once '../partials/footer.php';

    if (isset($_POST["nome"]) && isset($_POST["valorUnitario"]) && isset($_POST["quantidade"]) && isset($_POST["codBarras"]))
        createProductAction($conn, $_POST["nome"], $_POST["valorUnitario"], $_POST["quantidade"], $_POST["codBarras"]);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Inclusão de novo produto</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../product/create.php" method="POST">
                <label>Nome do produto</label>
                <input type="text" name="nome" required/>
                <label>Valor do produto</label>
                <input type="currency" name="valorUnitario" required/>
                <label>Quantidade</label>
                <input type="number" name="quantidade" required/>
                <label>Código de barras</label>
                <input type="text" name="codBarras" required/>
                <button class="btn btn-success text-white" type="submit">Incluir</button>

            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>