<?php
include "include/functions.php";
include "include/conection.php";


//função de autenticar toda vez que logar
autenticar();


$sql = "SELECT * FROM produtos WHERE deleted_at IS NULL;"; //string com o comando SQL a ser executado
$comando = $pdo->prepare($sql);
$comando = $pdo->query($sql);   //montamos e deixamos o SQL preparado

$resultado = $comando->fetchAll(); //executamos o comando "pegando tudo", FETCHALL pega todos os registros, o FETCH pega 

?>
<main>
        <table>
            <thead>
                <tr>
                    <td>COD.</td>
                    <td>NOME</td>
                    <td>CATEGORIA</td>
                    <td>PREÇO</td>
                    <td>DELETAR</td>
                    <td>EDITAR</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultado as $produto){ ?>
                <tr>
                    <td><?= $produto["codigo"]?></td>
                    <td><?= $produto["nome"]?></td>
                    <td><?= $produto["categoria"]?></td>
                    <td><?= $produto["preco_unitario"]?></td>
                    <td><a href="excluir_produto.php?codigo=<?=$produto["codigo"]?>">Deletar</a></td>
                    <td><a href="form_alterar_produto.php?codigo=<?=$produto["codigo"]?>">Editar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div>
        <!-- <?= var_dump($produto);?> -->
        </div>
    </main>