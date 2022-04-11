<?php

    require_once '../../../config.php';
    require_once '../../actions/client.php';
    require_once '../../pages/partials/header.php';

    if (isset($_POST["id"], $_POST["cpf"], $_POST["email"], $_POST["nome"]))
        updateClientAction($conn, $_POST["id"], $_POST["cpf"], $_POST["email"], $_POST["nome"]);
    
    $client = findClientAction($conn, $_GET['id']);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Edição de registro de cliente</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/client/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$client['id']?>" required/>
                <label>CPF</label>
                <input type="text" name="cpf" value="<?=htmlspecialchars($client['cpf'])?>" required/>
                <label>E-mail</label>
                <input type="email" name="email" value="<?=htmlspecialchars($client['email'])?>" required/>
                <label>Nome</label>
                <input type="text" name="nome" value="<?=htmlspecialchars($client['nome'])?>" required />

                <button class="btn btn-success text-white" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>