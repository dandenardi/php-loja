<?php
    require_once '../../../config.php';
    //has $conn
    require_once '../../actions/order.php';
    //has readOrderAction()
    require_once '../../actions/client.php';
    //has readClientAction()
    require_once 'C:/projetos/newtab/php-projeto-individual/src/pages/partials/header.php';

    $clients = readClientAction($conn);

    if (isset($_POST["dtPedido"]) && isset($_POST["cpfComprador"]) && isset($_POST["idProduto"]) && isset($_POST["stats"]))
        createOrderAction($conn, $_POST["dtPedido"], $_POST["cpfComprador"], $_POST["idProduto"], $_POST["stats"]);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Criação de Pedido</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../order/create.php" method="POST">
                <label>Data da compra</label>
                <input type="date" name="dtPedido" required/>
                <label>CPF do comprador</label>
                <select name="cpfComprador">
                    <?php
                        foreach($clients as $client):;
                        
                    ?>
                        <option value="<?php echo $client["id"];
                        ?>">
                            <?php echo $client["cpf"];
                            ?>
                        
                    </option>
                    <?php
                        endforeach;
                    ?>
                </select>
                <label>ID do produto</label>
                <input type="number" name="idProduto" required/>
                
                <input type="hidden" name="stats" value="Em Aberto" required/>

                <button class="btn btn-success text-white" type="submit">Save</button>

            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>