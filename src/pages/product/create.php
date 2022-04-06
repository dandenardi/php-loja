<?php
    require_once '../../../config.php';
    require_once 'C:/projetos/newtab/php-projeto-individual/src/actions/client.php';
    require_once 'C:/projetos/newtab/php-projeto-individual/src/pages/partials/header.php';

    if (isset($_POST["cpf"]) && isset($_POST["email"]) && isset($_POST["nome"]))
        createClientAction($conn, $_POST["cpf"], $_POST["email"], $_POST["nome"]);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Client - Create</h1></a>
        <a class="btn btn-success text-white" href="../../../index.php">Prev</a>
    </div>
    <div class="row flex-center">
        <div class="form-div">
            <form class="form" action="../client/create.php" method="POST">
                <label>CPF</label>
                <input type="text" name="cpf" required/>
                <label>E-mail</label>
                <input type="email" name="email" required/>
                <label>name</label>
                <input type="text" name="nome" required/>

                <button class="btn btn-success text-white" type="submit">Save</button>

            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>