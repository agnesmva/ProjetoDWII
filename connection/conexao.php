<?php
    $databasetype = "mysql";
    $server = "localhost";
    $port = 3306;
    $database = 'apotecario';

    $databaseUser = 'php';
    $userPassword = 'Senha!123';

    $dsn = "$databasetype:host=$server;dbname=$database;port=$port";

    try{
        $pdo = new PDO($dsn, $databaseUser, $userPassword);
    }catch(PDOException $exception){
        throw new PDOException($exception->getMessage(), $exception->getCode());
    }
?>