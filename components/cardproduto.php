<div class="card text-center d-flex cardpocao justify-content-center">
  <img src="<?= $img ?>" class="card-img-top  justify-content-center imgpocao">
  <div class="card-body">
    <h5 class="card-title"><?= $nome ?></h5>
    <p class="card-text"><?= $tipo ?>.</p>
    <p class="card-text"><?= $preco_unitario ?>.</p>
    <a href="produto.php?id=<?= $id ?>" class="btn">Saiba mais sobre a poção</a>
  </div>
</div>