<?php
session_start();
include 'connection/conexao.php';

$sql = "SELECT * FROM produto WHERE tipo = 'Poção';";
$command = $pdo->query($sql);
$pocoes = $command->fetchAll();

$sql = "SELECT * FROM produto WHERE tipo = 'Ingrediente';";
$command = $pdo->query($sql);
$ingredientes = $command->fetchAll();

include 'components/head.php';
include 'components/header.php';
?>
<main>
    <section>
        <?php
        if (isset($_SESSION['name'])) {
        ?>
            <div>
                <h2>Olá, <?= $_SESSION['name'] ?> </h2>
            </div>
        <?php
        }
        ?>
    </section>

    <section id="secaoPocoes">
        <h2>Poções</h2>
        <div class="row">
            <?php
            foreach ($pocoes as $pocao) {
            ?>
                <div class="col-6 mb-4">
                    <?php
                    $id = $pocao['id'];
                    $img = $pocao['url_foto'];
                    $nome = $pocao['nome'];
                    $tipo = $pocao['tipo'];
                    $preco_unitario = $pocao['preco_unitario'];
                    include 'components/cardproduto.php';
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </section>

    <section id="secaoIngredientes">
        <h2>Ingredientes</h2>
        <div class="row">
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <div class="col-6 mb-4">
                    <?php
                    $id = $ingrediente['id'];
                    $img = $ingrediente['url_foto'];
                    $nome = $ingrediente['nome'];
                    $tipo = $ingrediente['tipo'];
                    $preco_unitario = $ingrediente['preco_unitario'];
                    include 'components/cardproduto.php';
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>