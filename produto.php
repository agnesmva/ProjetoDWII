<?php
session_start();
include 'connection/conexao.php';

$id = htmlspecialchars($_GET['id']);

$sql = "SELECT * FROM produto WHERE id = :id;";
$command = $pdo->prepare($sql);
$command->bindParam(":id", $id);
$command->execute();
$produto = $command->fetch();

include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <img src="<?= $produto['url_foto']; ?>" alt="">
            </div>
            <div class="col-6">
                <h3><?= $produto['nome']; ?></h3>
                <p><?= $produto['tipo']; ?></p>
                <p><?= $produto['preco_unitario']; ?></p>
                <p><?= $produto['descricao']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 justify-content-center d-flex">
                <button>
                    <a href="adicionarCaldeirao.php?id=<?= $produto['id'] ?>">Adicionar ao caldeirão</a>
                </button>
            </div>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>