<?php
include "processamento/functions.php";
include "../connection/conexao.php";


//função de autenticar toda vez que logar
autenticar();


$sql = "SELECT * FROM produto WHERE deleted_at IS NULL;"; //string com o comando SQL a ser executado
$comando = $pdo->prepare($sql);
$comando = $pdo->query($sql);   //montamos e deixamos o SQL preparado

$resultado = $comando->fetchAll(); //executamos o comando "pegando tudo", FETCHALL pega todos os registros, o FETCH pega 
include "include/head.php";
include "include/header.php";
?>
<main>
        <table>
            <thead>
                <tr>
                    <td>COD.</td>
                    <td>NOME</td>
                    <td>CATEGORIA</td>
                    <td>IMAGEM</td>
                    <td>PREÇO</td>
                    <td>DELETAR</td>
                    <td>EDITAR</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $produto){ ?>
                <tr>
                    <td><?= $produto["id"]?></td>
                    <td><?= $produto["nome"]?></td>
                    <td><?= $produto["tipo"]?></td>
                    <td><img src="../<?= $produto["url_foto"]?>" alt="" width="80px"></td>
                    <td><?= $produto["preco_unitario"]?></td>
                    <td><a href="excluir_produto.php?codigo=<?=$produto["id"]?>">Deletar</a></td>
                    <td><a href="alterar_produto.php?codigo=<?=$produto["id"]?>">Editar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
