<?php

    include "../admin/processamento/functions.php";

    autenticar();

    include "<admin>conexao.php";

    $nomeUsuario = htmlspecialchars($_POST["nome"]);
    $cpfUsuario = htmlspecialchars($_POST["cep"]);
    $dataNascUsuario = htmlspecialchars($_POST["datanascimento"]);
    $telefoneUsuario = htmlspecialchars($_POST["telefone"]);
    $emailUsuario = md5htmlspecialchars($_POST["email"]);
    $senhaUsuario = md5htmlspecialchars($_POST["senha"]);


    $sql = "INSERT INTO usuario (nomeUsuario,cpfUsuario,dataNascUsuario,telefoneUsuario,emailUsuario,senhaUsuario) VALUES  (:nomeUsuario, :cpfUsuario, :dataNascUsuario, :telefoneUsuario, :senhaUsuario, :emailUsuario, :senhaUsuario)";
    
    

    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":cpfUsuario", $cpfUsuario);
    $command->bindParam(":datanascimento", $dataNascUsuario);
    $command->bindParam(":telefone", $telefoneUsuario);
    $command->bindParam(":emailUsuario", $emailUsuario);
    $command->bindParam(":senhaUsuario", $senhaUsuario);
    $command->execute();

    $sql = "SELECT idUsuario FROM usuario WHERE nomeUsuario = :nomeUsuario AND cpfUsuario = :cpfUsuario";
    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":cpfUsuario", $cpfUsuario);
    $query = $commando->execute();
    $idUsuario = $query['idUsuario'];

    $sql = "INSERT INTO telefoneUsuario (telefoneUsuario,idUsuario) VALUES (:telefoneUsuario, :idUsuario)";
    $command = $pdo->prepare($sql);
    $command->bindParam(":telefoneUsuario" , $telefoneUsuario);
    $command->bindParam(":idUsuario" , $idUsuario);
    $sucess = $command->execute;
    

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