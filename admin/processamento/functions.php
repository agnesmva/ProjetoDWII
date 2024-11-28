<?php 
function adm_validate($username, $password){
    if($username == "admin" && $password == "0101"){
        return true;
    }
    return false;
}

function autenticar(){
    session_start();

    // verificando a vaariavel de sessão para o administrador está configurada, caso não esteja configurada, redirecionamos o usuário para a página de login
    if(!isset($_SESSION["admin"])){
        header("Location: http://localhost:3030/adm/login.php");
    }
}
?>