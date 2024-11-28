<?php
include "include/functions.php";
include "include/conexao.php";

autenticar();
   
    $nomeUsuario = htmlspecialchars($_POST["nome"]);
    $telefoneUsuario = htmlspecialchars($_POST["telefone"]);
    $emailUsuario = htmlspecialchars($_POST["email"]);
    $usernameUsuario = htmlspecialchars($_POST["username"]);
    $senhaUsuario = md5htmlspecialchars($_POST["senha"]);
    $enderecoUsuario = intval($_POST["endereco"]);


    $sql = "INSERT INTO usuario (nome,telefone,email,username,senha,endereco) VALUES  (:nomeUsuario, :telefoneUsuario, :emailUsuario, :usernameUsuario, :senhaUsuario, :enderecoUsuario)";
    
    

    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":telefoneUsuario", $telefoneUsuario);
    $command->bindParam(":emailUsuario", $emailUsuario);
    $command->bindParam(":usernameUsuario", $usernameUsuario);
    $command->bindParam(":senhaUsuario", $senhaUsuario);
    $command->bindParam(":enderecoUsuario", $enderecoUsuario);

    $sucesso = $command->execute();
   

    if($sucesso) { 
       header("location: http://localhost/admin/login.php");
    }else {
        include '../view/components/head.php';
        include '../view/components/header.php';
        ?>
        <main>
            <p>FALHA AO CADASTRAR</p>
            <a href="../view/sigin.php">Tentar novamente</a>
         </main>
         <?php
           include '../view/components/footer.php';
           include '../view/components/foot.php';
    }

?>