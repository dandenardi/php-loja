<?php

    function findOrderDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM pedido WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');


        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        $order = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        mysqli_close($conn);
        return $order;
    }

    function createOrderDb($conn, $dtPedido, $cpfComprador, $idProduto, $stats){
        $dtPedido = mysqli_real_escape_string($conn, $dtPedido);
        $cpfComprador = mysqli_real_escape_string($conn, $cpfComprador);
        $idProduto = mysqli_real_escape_string($conn, $idProduto);
        $stats = mysqli_real_escape_string($conn, $stats);
        

        if($dtPedido && $cpfComprador && $idProduto && $stats) {
            $sql = "INSERT INTO pedido (dtPedido, cpfComprador, idProduto, stats) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'ssss', $dtPedido, $cpfComprador, $idProduto, $stats);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }

    }

    function readOrderDb($conn){
        $order = [];

        $sql ="SELECT * FROM pedido";
        $result = mysqli_query($conn, $sql);

        $result_check = mysqli_num_rows($result);

        if($result_check > 0)
            $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        else
            $orders = '';
        mysqli_close($conn);
        return $orders;
    }


    function updateOrderDb($conn, $id, $dtPedido, $cpfComprador, $idProduto, $stats){
        if($id && $dtPedido && $cpfComprador && $idProduto){
            $sql = "UPDATE pedido SET dtPedido = ?, cpfComprador =  ?, idProduto = ?, stats = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'ssssi', $dtPedido, $cpfComprador, $idProduto, $stats, $id);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }
    }

    function deleteOrderDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        if($id){
            $sql = "DELETE FROM pedido WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }