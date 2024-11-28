<?php
   session_start();

include "admin/include/conexao.php";


   if (isset($_POST['adicionar'])) {
      $id_produto = $_POST['codigo'];
      $quantidade = $_POST['quantidade'];
  
      $sql = "INSERT INTO carrinho (id_produto, quantidade, sessao) VALUES (:id_produto, :quantidade, :sessao)";
      $comando = $pdo->prepare($sql);
      $comando->bindParam(':id_produto', $id_produto);
      $comando->bindParam(':quantidade', $quantidade);
      $comando->bindParam(':sessao', session_id());
      $sucesso = $comando->execute();

      if ($sucesso) {
          header("Location: http://localhost/projetodwll/admin/listar_produtos.php");
      }
  
      header("Location: caldeirao.php");
      exit;
  }
?>
<h1 style="color: red">FALHA AO ADICIONAR O PRODUTO AO CARRINHO </h1>