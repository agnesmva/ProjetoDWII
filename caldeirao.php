<?php
session_start();

include "cabecalho.php";

include "admin/conexao.php";

$sql = "SELECT 
            p.nome AS nomepocao, 
            p.preco_unitario AS preco,
            p.tipo AS tipo, 
            c.quantidade AS quantidade,
            c.id_produto AS codigo
        FROM 
            carrinho c 
        INNER JOIN 
            produto p 
        ON 
            c.id_produto = p.id
        WHERE 
            c.sessao = :sessao";

$comando = $pdo->prepare($sql);
$comando->bindParam(":sessao", $id);
$comando->execute();
$res = $comando->fetchAll();
?>

<main>
    <h2>Seu Caldeirão de Poções</h2>
    <?php if (count($res) > 0):  ?>
        <table border="1">
            <tr>
                <th>Ação</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Subtotal</th>
            </tr>
            <?php 
            $total = 0;
            foreach ($res as $pocoes): 
                $subtotal = $pocoes["preco"] * $pocoes["quantidade"];
                $total += $subtotal;
            ?>
            <tr>
                <td>
                    <a href="excluir_produto.php?codigo=<?= $pocoes["codigo"] ?>">Remover</a>
                </td>
                <td><?= htmlspecialchars($pocoes["nomeproduto"]) ?></td>
                <td><?= htmlspecialchars($pocoes["tipo"]) ?></td>
                <td><?= htmlspecialchars($pocoes["quantidade"]) ?></td>
                <td><?= number_format($pocoes["preco"], 2, ",", ".") ?></td>
                <td><?= number_format($subtotal, 2, ",", ".") ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" style="text-align: right;"><strong>Total:</strong></td>
                <td><strong><?= number_format($total, 2, ",", ".") ?></strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Seu caldeirão está vazio! Adicione algumas poções mágicas.</p>
    <?php endif; ?>
</main>

<?php include "footer.php" ?>