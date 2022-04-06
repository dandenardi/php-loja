<?php

    function findClientDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM cliente WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
            exit('SQL error');


        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);

        $client = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        mysqli_close($conn);
        return $client;
    }

    function createClientDb($conn, $cpf, $email, $nome){
        $cpf = mysqli_real_escape_string($conn, $cpf);
        $email = mysqli_real_escape_string($conn, $email);
        $nome = mysqli_real_escape_string($conn, $nome);
        

        if($cpf && $email && $nome) {
            $sql = "INSERT INTO cliente (cpf, email, nome) VALUES (?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'sss', $cpf, $email, $nome);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }

    }

    function readClientDb($conn){
        $client = [];

        $sql ="SELECT * FROM cliente";
        $result = mysqli_query($conn, $sql);

        $result_check = mysqli_num_rows($result);

        if($result_check > 0)
            $clients = mysqli_fetch_all($result, MYSQLI_ASSOC);

        else
            $clients = '';
        mysqli_close($conn);
        return $clients;
    }


    function updateClientDb($conn, $id, $cpf, $email, $nome){
        if($id && $cpf && $email && $nome){
            $sql = "UPDATE cliente SET cpf = ?, email =  ?, nome = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'sssi', $cpf, $email, $nome, $id);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            return true;
        }
    }

    function deleteClientDb($conn, $id){
        $id = mysqli_real_escape_string($conn, $id);

        if($id){
            $sql = "DELETE FROM cliente WHERE id = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql))
                exit('SQL error');

            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            return true;
        }
    }