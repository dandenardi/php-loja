<?php

    require_once '../database/product.php';

    function findProductAction($conn, $id){
        return findProductDb($conn, $id);
    }

    function readProductAction($conn){
        return readProductDb($conn);
    }

    function createProductAction($conn, $id,  $nome, $valorUnitario, $quantidade, $codBarras){
        $createProductDb = createClientDb($conn, $id, $nome, $valorUnitario, $quantidade, $codBarras);
        $message = $createProductDb == 1 ? 'success-create' : 'error-create';
        return header("Location: ./read.php?message=$message");
    }

    function updateProductAction($conn, $id, $nome, $valorUnitario, $quantidade, $codBarras){
        $updateProductDb = updateProductDb($conn, $id, $nome, $valorUnitario, $quantidade, $codBarras);
        $message = $updateProductDb == 1 ? 'success-update' : 'error-update';
        return header("Location: ./read.php?message=$message");
    }

    function deleteProductAction($conn, $id){
        $deleteProductDb = deleteProductDb($conn, $id);
        $message = $deleteProductDb == 1 ? 'success-remove' : 'error-remove';
        return header("Location: ./read.php?message=$message");
    }
