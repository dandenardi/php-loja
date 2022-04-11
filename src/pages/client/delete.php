<?php

    require_once '../../../config.php';
    require_once '../../actions/client.php';
    require_once '../partials/header.php';

    if(isset($_POST['id']))
        deleteClientAction($conn, $_POST['id']);

?>

<div class="container">
    <div class="row">
        <a href="../../..index.php"><h1>Remoção de registro de cliente</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/client/delete.php" method="POST">
                <label>Você tem certeza que quer remover este cliente?</label>
                <input type="hidden" name="id" value="<?=$_GET['id']?>" required />

                <button class="btn btn-success text-white" type="submit">Yes</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>