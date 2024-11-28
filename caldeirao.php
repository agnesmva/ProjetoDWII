<?php
session_start();
if (isset($_SESSION['nomeAlquimista'])){
    include "connection/conexao.php";

    $id = session_id();

    $sql = "SELECT 
                p.nome AS nomeproduto, 
                p.preco_unitario AS preco,
                p.tipo AS tipo, 
                p.url_foto AS foto,
                count(c.id_produto) AS quantidade,
                c.id_produto AS codigo
            FROM 
                carrinho c 
            INNER JOIN 
                produto p 
            ON 
                c.id_produto = p.id
            WHERE 
                c.sessao = :sessao
            GROUP BY
                c.id_produto";

    $comando = $pdo->prepare($sql);
    $comando->bindParam(":sessao", $id);
    $comando->execute();
    $produtosCaldeirao = $comando->fetchAll();

    include 'components/head.php';
    include 'components/header.php';
    ?>

    <main>
        <?php
        if ($produtosCaldeirao) {
            $total = 0;
        ?>
            <div class="container-fluid secaoCaldeirao">
                <?php
                foreach ($produtosCaldeirao as $produtoCaldeirao) {
                    $subtotal = $produtoCaldeirao["preco"] * $produtoCaldeirao["quantidade"];
                    $total += $subtotal;
                }
                $size = 2;
                $title1 = "Seu Caldeirão de Poções";
                $title2 = "Total: " . number_format($total, 2, ",", "."); //aqui
                include 'components/2col.php';
                ?>
                <div class="row">
                    <?php
                    foreach ($produtosCaldeirao as $produtoCaldeirao) {
                    ?>
                        <div class="col-lg-3 col-sm-6 col-md-4 mb-4">
                            <?php
                            $subtotal = $produtoCaldeirao["preco"] * $produtoCaldeirao["quantidade"];
                            $total += $subtotal;
                            $id = htmlspecialchars($produtoCaldeirao["codigo"]);
                            $img = htmlspecialchars($produtoCaldeirao["foto"]);
                            $nome = htmlspecialchars($produtoCaldeirao["nomeproduto"]);
                            $tipo = htmlspecialchars($produtoCaldeirao["tipo"]);
                            $preco_unitario = number_format($produtoCaldeirao["preco"], 2, ",", ".");
                            $quantidade = htmlspecialchars($produtoCaldeirao["quantidade"]);
                            $subtotal = number_format($subtotal, 2, ",", ".");
                            include 'components/cardcaldeirao.php';
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="container-fluid caldeiraovazio">
                <?php
                $size = 2;
                $title = 'Seu caldeirão está vazio! Adicione algumas poções mágicas.';
                include 'components/centertitle.php';
                ?>
                <div class="row align-items-center justify-content-center centertitle">
                    <div class="col-6 align-items-center justify-content-center text-center">
                        <a class="" href="index.php">Volte à loja e colete seus itens.</a>
                    </div>
                </div>
            </div>
    </main>
    <?php
        }
        include 'components/footer.php';
        include 'components/foot.php';
    }else{
        header("Location: index.php");
    }
?>
