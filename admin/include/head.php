<?php

switch ($_SERVER['REQUEST_URI']) {
    case '/admin/login.php':
        $tituloPagina = " Administração Apotecário de Renard";
        break;
    case '/admin/listar_produtos.php':
      $tituloPagina = " Administração Apotecário de Renard";
      break;
    default:
        echo 'insira a rota no arquivo de head corretamente';
        break;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title><?=$tituloPagina?></title>
</head>
<body>
    
