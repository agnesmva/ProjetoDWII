<?php
include "processamento/functions.php";
include "../connection/conexao.php";
autenticar();

$sql = "UPDATE produto SET deleted_at = NOW() WHERE id = :cod;";

$codigo = intval(htmlspecialchars($_GET["id"])); //preciso colocar uma ação na tabela de excluir

$comando = $pdo->prepare($sql);
$comando -> bindParam(":cod", $codigo);
$sucesso = $comando -> execute();

if($sucesso){
    header("Location: listar_produtos.php");
}
?>