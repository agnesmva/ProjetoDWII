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
    <div class="container-fluid secaoProduto">
        <div class="row justify-content-center align-items-center">
            <div class="col-3">
                <img src="<?= $produto['url_foto']; ?>" class="imgproduto2 img-fluid">
            </div>
            <div class="col-6">
                <h3><?= $produto['nome']; ?></h3>
                <p class="categoria"><?= $produto['tipo']; ?></p>
                <p class="preco">R$ <?= $produto['preco_unitario']; ?></p>
                <p class="descricao"><?= $produto['descricao']; ?></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 justify-content-end d-flex">
                <a href="adicionarCaldeirao.php?id=<?= $produto['id'] ?>" class="btnAddCaldeirao">Adicionar ao caldeirão</a>
            </div>
        </div>
    </div>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>