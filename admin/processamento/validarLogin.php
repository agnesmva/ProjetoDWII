<?php 
    session_start();

    include "functions.php";
    
    if(adm_validate($_POST["username"], $_POST["password"])){
        $_SESSION["admin"] = $_POST["username"];
        header("Location: http://localhost:3030/adm/index.php");
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>FatecShop - Admin</title>
</head>
<body>
    <header> <h1>Área Administrativa</h1></header>
    <main>
        <div>
            <h1>Acesso Negado</h1>
            <p>Infelizmente você errou a senha! Digite novamente clicando no link abaixo</p>
            <a href="login.php">Login</a>
        </div>

        
        
        
    </main>
    <footer></footer>
</body>
</html>