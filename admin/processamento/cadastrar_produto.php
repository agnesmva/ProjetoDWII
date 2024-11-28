<?php
include "functions.php";
include "conection.php";

autenticar();

$sql = "INSERT INTO produtos (nome, descricao, categoria, preco_unitario) VALUES(:nameProduct, :descriptionProduct, :typeProduct, :priceProduct);";


$price = floatval($_POST["priceProduct"]);
$pName = htmlspecialchars($_POST["nameProduct"]);
$pDesc = htmlspecialchars($_POST["descriptionProduct"]);
$pType = htmlspecialchars($_POST["typeProduct"]);
$comando = $pdo->prepare($sql);

$comando -> bindParam(":nameProduct", $pName);
$comando -> bindParam(":descriptionProduct", $pDesc);
$comando -> bindParam(":typeProduct", $pType);


$comando -> bindParam(":priceProduct", $price);

/* htmlspecialchars deve ser utilizado para existar cross site script, xss, é um tipo de ataque que inclui um script no campo de texto do formulario */

$sucesso = $comando->execute();

if($sucesso){
    header("Location: ../listar_produtos.php");
}
?>
<h1 style="color: red">Falha de Conexão</h1>
