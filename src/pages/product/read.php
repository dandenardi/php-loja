<?php
    require_once '../../../config.php';
    require_once '../../actions/product.php';
    require_once '../../modules/messages.php';
    require_once '../../pages/partials/header.php';

    $product = readProductAction($conn);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Registro de produtos</h1></a>
        <a class="btn btn-success text-white" href="./create.php">Novo</a>
        <a class="btn btn-success text-white" href="../home.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <?php if(isset($_GET['message'])) echo printMessage($_GET['message']); ?>
    </div>

    <table class="table-users">
        <tr>
            <th>Nome</th>
            <th>Valor (R$)</th>
            <th>Quantidade</th>
            <th>Código de barras</th>
        </tr>
        <?php 
            if ($product != '')
                foreach($product as $row): 
        ?>
        <tr>
            <td class="product-name"><?=htmlspecialchars($row['nome'])?></td>
            <td class="product-value"><?=htmlspecialchars($row['valorUnitario'])?></td>
            <td class="product-quantity"><?=htmlspecialchars($row['quantidade'])?></td>
            <td class="product-barcode"><?=htmlspecialchars($row['codBarras'])?></td>
            <td>
                <a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar produto</a>
            </td>
            <td>
                <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once '../partials/footer.php'; ?>