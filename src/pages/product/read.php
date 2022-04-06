<?php
    require_once '../../../config.php';
    require_once '../../actions/client.php';
    require_once '../../modules/messages.php';
    require_once '../../pages/partials/header.php';

    $client = readClientAction($conn);

?>

<div class="container">
    <div class="row">
        <a href="../../../index.php"><h1>Client - Read</h1></a>
        <a class="btn btn-success text-white" href="./create.php">New</a>
        <a class="btn btn-success text-white" href="../home.php">Voltar</a>
    </div>
    <div class="row flex-center">
        <?php if(isset($_GET['message'])) echo printMessage($_GET['message']); ?>
    </div>

    <table class="table-users">
        <tr>
            <th>CPF</th>
            <th>Email</th>
            <th>nome</th>
        </tr>
        <?php 
            if ($client != '')
                foreach($client as $row): 
        ?>
        <tr>
            <td class="client-cpf"><?=htmlspecialchars($row['cpf'])?></td>
            <td class="client-email"><?=htmlspecialchars($row['email'])?></td>
            <td class="client-name"><?=htmlspecialchars($row['nome'])?></td>
            <td>
                <a class="btn btn-primary text-white" href="./edit.php?id=<?=$row['id']?>">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger text-white" href="./delete.php?id=<?=$row['id']?>">Remove</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require_once '../partials/footer.php'; ?>