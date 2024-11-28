<?

include "include/functions.php";

autenticar();
?>
<h2>Cadastro de novo Cliente </h2>
<main>
<form action="cadastrar_cliente.php" method="POST">
    <div>
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" size="30" maxlength="30" required>
    </div>
    <div>
        <label for="cep">Endereço:</label>
        <input type="text" id="endereco" name="endereco" size="10" maxlength="10" required>
    </div>
    <div>
        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" size="30" maxlength="30" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" size="15" maxlength="15" required>
    </div>
    <div>
        <label for="username">Username:</label>
        <input type="text" id="text" name="text" size="15" maxlength="15" required>
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" minlength="6" maxlength="12" required>
    </div>
    <div id="div_botao">
     <button>Cadastrar</button>
    </div>
</form>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>
      