<?php

    require_once '../../../config.php';
    require_once '../../actions/order.php';
    require_once '../../pages/partials/header.php';

    if (isset($_POST["id"], $_POST["dtPedido"], $_POST["cpfComprador"], $_POST["idProduto"], $_POST["stats"]))
        updateOrderAction($conn, $_POST["id"], $_POST["dtPedido"], $_POST["cpfComprador"], $_POST["idProduto"], $_POST["stats"]);
    
    $client = findOrderAction($conn, $_GET['id']);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Edição de Pedido</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar para página principal</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/order/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$order['id']?>" required/>
                <label>Data do Pedido</label>
                <input type="date" name="dtPedido" value="<?=htmlspecialchars($order['dtPedido'])?>" required/>
                <label>CPF do comprador</label>
                <input type="text" name="cpfComprador" value="<?=htmlspecialchars($order['cpfComprador'])?>" required/>
                <label>Identificação do produto</label>
                <input type="number" name="idProduto" value="<?=htmlspecialchars($client['idProduto'])?>" required />
                <select name="stats">
                    <option value="Em Aberto" selected>Em Aberto</option> 
                    <option value="Pago">Pago</option>
                    <option value="Cancelado">Cancelado</option>
                </select>

                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>