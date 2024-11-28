<div class="card text-center d-flex cardproduto  border-0 justify-content-center">
  <div class="divimgproduto">
    <img src="<?= $img ?>" class="card-img-top  justify-content-center imgproduto img-fluid">
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $nome ?></h5>
    <p class="card-text"><?= $tipo ?>.</p>
    <p class="card-text">Preço unitário: <?= $preco_unitario ?>.</p>
    <p class="card-text">Quantidade: <?= $quantidade ?>.</p>
    <p class="card-text">Subtotal: <?= $subtotal ?>.</p>
    <a href="adicionarCaldeirao.php?id=<?= $id ?>" class="btnAddCaldeirao">Adicionar mais</a>
  </div>
</div>