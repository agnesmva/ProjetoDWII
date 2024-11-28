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
    <?php
        if (isset($_SESSION['nome'])) {
            $msg = 'Olá, $_SESSION[\'nome\']!';
        }else{
            $msg = 'Olá, anony!';
        }
        include 'components/glasscontainer.php';
    ?>

    <section id="secaoPocoes" class="container-fluid m-4">
        <?php
        $size = 2;
        $title = "Poções";
        include 'components/lefttitle.php';
        ?>
        <div class="row">
            <?php
            foreach ($pocoes as $pocao) {
            ?>
                <div class="col-lg-3 col-sm-6 col-md-4 mb-4">
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

    <section id="secaoIngredientes" class="container-fluid m-4">
        <?php
        $size = 2;
        $title = "Ingredientes";
        include 'components/lefttitle.php';
        ?>
        <div class="row">
            <?php
            foreach ($ingredientes as $ingrediente) {
            ?>
                <div class="col-lg-3 col-sm-6 col-md-4 mb-4">
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