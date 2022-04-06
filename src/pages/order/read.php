<?php
    require_once '../../../config.php';
    require_once '../../actions/order.php';
    require_once '../../modules/messages.php';
    require_once '../../pages/partials/header.php';

    $order = readOrderAction($conn);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Lista de pedidos</h1></a>
        <a class="btn btn-success text-white" href="./create.php">Novo pedido</a>
        <a class="btn btn-success text-white" href="../home.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <?php if(isset($_GET['message'])) echo printMessage($_GET['message']); ?>
    </div>

    <table class="table-orders">
        <tr>

            <th>Data do Pedido</th>
            <th>CPF do Comprador</th>
            <th>Produto</th>
            <th>Situação da Compra</th>
        </tr>
        <?php 
            if ($order != '')
                foreach($order as $row): 
        ?>
        <tr>
            <td class="data-pedido"><?=htmlspecialchars($row['dtPedido'])?></td>
            <td class="cpf-comprador"><?=htmlspecialchars($row['cpfComprador'])?></td>
            <td class="id-produto"><?=htmlspecialchars($row['idProduto'])?></td>
            <td class="status"><?=htmlspecialchars($row['stats'])?></td>
            <td>
                <a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Editar compra</a>
            </td>
            <td>
                <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remover compra</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once '../partials/footer.php'; ?>