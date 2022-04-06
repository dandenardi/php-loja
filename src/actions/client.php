<?php

    require_once 'C:/projetos/newtab/php-projeto-individual/src/database/client.php';

    function findClientAction($conn, $id){
        return findClientDb($conn, $id);
    }

    function readClientAction($conn){
        return readClientDb($conn);
    }

    function createClientAction($conn, $cpf,  $email, $nome){
        $createClientDb = createClientDb($conn, $cpf, $email, $nome);
        $message = $createClientDb == 1 ? 'success-create' : 'error-create';
        return header("Location: ./read.php?message=$message");
    }

    function updateClientAction($conn, $id, $cpf, $email, $nome){
        $updateClientDb = updateClientDb($conn, $id, $cpf, $email, $nome);
        $message = $updateClientDb == 1 ? 'success-update' : 'error-update';
        return header("Location: ./read.php?message=$message");
    }

    function deleteClientAction($conn, $id){
        $deleteClientDb = deleteClientDb($conn, $id);
        $message = $deleteClientDb == 1 ? 'success-remove' : 'error-remove';
        return header("Location: ./read.php?message=$message");
    }
