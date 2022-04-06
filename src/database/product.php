<?php

    function findProductDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM produto WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');


        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        $product = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        mysqli_close($conn);
        return $product;
    }

    function createProductDb($conn, $nome, $valorUnitario, $quantidade, $codBarras){
        $nome = mysqli_real_escape_string($conn, $nome);
        $valorUnitario = mysqli_real_escape_string($conn, $valorUnitario);
        $quantidade = mysqli_real_escape_string($conn, $quantidade);
        $codBarras = mysqli_real_escape_string($conn, $codBarras);
        

        if($nome && $valorUnitario && $quantidade && $codBarras) {
            $sql = "INSERT INTO produto (nome, valorUnitario, quantidade, codBarras) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'ssss', $nome, $valorUnitario, $quantidade, $codBarras);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }

    }

    function readProductDb($conn){
        $product = [];

        $sql ="SELECT * FROM produtos";
        $result = mysqli_query($conn, $sql);

        $result_check = mysqli_num_rows($result);

        if($result_check > 0)
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        else
            $products = '';
        mysqli_close($conn);
        return $products;
    }


    function updateProductDb($conn, $id, $nome, $valorUnitario, $quantidade, $codBarras){
        if($id && $nome && $valorUnitario && $quantidade && $codBarras){
            $sql = "UPDATE produto SET nome = ?, valorUnitario =  ?, quantidade = ?, codBarras = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'ssssi', $nome, $valorUnitario, $quantidade, $codBarras, $id);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }
    }

    function deleteProductDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        if($id){
            $sql = "DELETE FROM produto WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }