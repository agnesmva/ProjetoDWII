<?php
include 'components/head.php';
include 'components/header.php';
?>
<main>
    <div class="login container-fluid">
        <div class="container-fluid">
            <?php
            $size = 3;
            $title = 'Que bom te ver novamente, Alquimista!';
            include 'components/centertitle.php';
            ?>
        </div>
        <form action="validaralquimista.php" method="post" class="container-fluid">
            <div class="justify-content-center formlogin">
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="usuario">Nome alquímico:</label>
                    </div>
                    <div class="col-2">
                        <input type="text" name="usuario" id="usuario">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        <label for="senha">Código arcano:</label>
                    </div>
                    <div class="col-2">
                        <input type="password" name="senha" id="senha">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-1">
                        <input type="submit" class="btnMaterializar border-0" value="Materializar">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <p class="col-12 text-center">
                        <a href="form_cadastro_clientes.php">Deseja transmutar sua realidade? Inicie sua jornada alquímica agora mesmo.</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</main>

<?php
include 'components/footer.php';
include 'components/foot.php';
?>