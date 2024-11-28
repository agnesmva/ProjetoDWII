<div class="card text-center d-flex cardproduto  border-0 justify-content-center">
  <div class="divimgproduto">
    <img src="<?= $img ?>" class="card-img-top  justify-content-center imgproduto img-fluid">
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $nome ?></h5>
    <p class="card-text"><?= $tipo ?>.</p>
    <p class="card-text"><?= $preco_unitario ?>.</p>
    <a href="produto.php?id=<?= $id ?>" class="btnMais">Saiba mais sobre a poção</a>
  </div>
</div>