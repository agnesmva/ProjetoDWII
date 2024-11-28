<?php
   session_start();

   include "include/conection.php";

   $codigo_produto = htmlspecialchars($_GET["codigo"]);

   $sql = "INSERT INTO  carrinho VALUES (:sessao, :prod, NULL,1)";
   $comando = $pdo->prepare($sql);
   $comando->bindParam(":sessao", session_id());
   $comando->bindParam(":prod", $codigo_produto);
   $resultado = $comando->execute();

   if($resultado){
   header("Location: caldeirao.php");
}
?>
<h1 style="color: red">FALHA AO ADICIONAR O PRODUTO AO CARRINHO </h1>