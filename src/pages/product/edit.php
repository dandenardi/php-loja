<?php

    require_once '../../../config.php';
    require_once '../../actions/product.php';
    require_once '../../pages/partials/header.php';

    if (isset($_POST["id"], $_POST["nome"], $_POST["valorUnitario"], $_POST["quantidade"], $_POST["codBarras"]))
        updateProductAction($conn, $_POST["id"], $_POST["nome"], $_POST["valorUnitario"], $_POST["quantidade"], $_POST["codBarras"]);
    
    $product = findProductAction($conn, $_GET['id']);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Edição de registro - produto</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/product/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$product['id']?>" required/>
                <label>Nome do produto</label>
                <input type="text" name="nome" value="<?=htmlspecialchars($product['nome'])?>" required/>
                <label>Valor do produto</label>
                <input type="currency" name="valorUnitario" value="<?=htmlspecialchars($product['valorUnitario'])?>" required/>
                <label>Quantidade</label>
                <input type="number" name="quantidade" value="<?=htmlspecialchars($product['quantidade'])?>" required/>
                <label>Código de barras</label>
                <input type="number" name="codBarras" value="<?=htmlspecialchars($product['codBarras'])?>" required/>

                <button class="btn btn-success text-white" type="submit">Salvar alterações</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>