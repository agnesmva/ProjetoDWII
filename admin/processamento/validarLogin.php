<?php 
    session_start();

    include "functions.php";
    
    if(adm_validate($_POST["username"], $_POST["password"])){
        $_SESSION["admin"] = $_POST["username"];
        header("Location: http://localhost:3030/adm/index.php");
    }
    else{
        include "include/header.php"; 
        include "include/head.php"; 
    }
    
?>
    <main>
        <div>
            <h1>Acesso Negado</h1>
            <p>Infelizmente você errou a senha! Digite novamente clicando no link abaixo</p>
            <a href="login.php">Login</a>
        </div>

        
        
        
    </main>
<?php "include/footer.php";?>