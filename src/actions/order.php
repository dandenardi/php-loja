<?php

    require_once 'C:/projetos/newtab/php-projeto-individual/src/database/order.php';

    function findOrderAction($conn, $id){
        return findOrderDb($conn, $id);
    }

    function readOrderAction($conn){
        return readOrderDb($conn);
    }

    function createOrderAction($conn, $dtPedido,  $cpfComprador, $idProduto, $stats){
        $createOrderDb = createOrderDb($conn, $dtPedido, $cpfComprador, $idProduto, $stats);
        $message = $createOrderDb == 1 ? 'success-create' : 'error-create';
        return header("Location: ./read.php?message=$message");
    }

    function updateOrderAction($conn, $id, $dtPedido, $cpfComprador, $idProduto, $stats){
        $updateOrderDb = updateOrderDb($conn, $id, $dtPedido, $cpfComprador, $idProduto, $stats);
        $message = $updateOrderDb == 1 ? 'success-update' : 'error-update';
        return header("Location: ./read.php?message=$message");
    }

    function deleteOrderAction($conn, $id){
        $deleteOrderDb = deleteOrderDb($conn, $id);
        $message = $deleteOrderDb == 1 ? 'success-remove' : 'error-remove';
        return header("Location: ./read.php?message=$message");
    }
