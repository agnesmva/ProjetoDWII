<?php
   session_start();

    include "connection/conexao.php";

      $id_produto = $_GET['id'];
  
      $sql = "SELECT preco_unitario FROM produto WHERE id = :id_produto";
      $comando = $pdo->prepare($sql);
      $comando->bindParam(':id_produto', $id_produto);
      $comando->execute();
      $resultado = $comando->fetch();

      $preco = $resultado['preco_unitario'];
      $sessao = session_id();

      $sql = "INSERT INTO carrinho (sessao, id_produto, preco_unitario) VALUES (:sessao, :id_produto, :preco_unitario)";
      $comando = $pdo->prepare($sql);
      $comando->bindParam(':id_produto', $id_produto);
      $comando->bindParam(':preco_unitario', $preco);
      $comando->bindParam(':sessao', $sessao);
      $sucesso = $comando->execute();

      if ($sucesso) {
          header("Location: caldeirao.php");
      }
?>
<h1 style="color: red">FALHA AO ADICIONAR O PRODUTO AO CARRINHO </h1>
