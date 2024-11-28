<?php
include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="signin container-fluid">
        <div class="container-fluid">
            <?php
            $size = 3;
            $title = 'Bem vinda, Alquimista!';
            include 'components/centertitle.php';
            ?>
        </div>
        <form action="cadastrar_cliente.php" method="POST" class="container-fluid">
            <div class="justify-content-center formlogin">
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="nome">Nome: </label>
                    </div>
                    <div class="col-2">
                        <input type="text" id="nome" name="nome" size="30" maxlength="30" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="telefone">Telefone:</label>
                    </div>
                    <div class="col-2">
                        <input type="tel" id="telefone" name="telefone" size="30" maxlength="30" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-2">
                        <input type="email" id="email" name="email" size="15" maxlength="15" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="username">Username:</label>
                    </div>
                    <div class="col-2">
                        <input type="text" id="username" name="username" size="15" maxlength="15" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="senha">Senha:</label>
                    </div>
                    <div class="col-2">
                        <input type="password" name="senha" minlength="6" maxlength="12" required>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-1">
                        <input type="submit" class="btnTransmutar border-0" value="Transmutar">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <p class="col-12 text-center">
                        <a href="login.php">Já é medievo na transmutação? Retorne à sua jornada alquímica agora mesmo.</a>
                    </p>
                </div>
            </div>
        </form>
</main>
<?php
include 'components/footer.php';
include 'components/foot.php';
?>