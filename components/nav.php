<div class="row">
    <nav id="barraNav" class="navbar navbar-expand-lg" id="navbar">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="btnNav" href="index.php">Círculo de Convergência</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="btnNav" href="caldeirao.php">Caldeirão</a>
            </li>
            <li class="nav-item">
                <a class="btnNav" href="about.php">Sobre o Apotecário</a>
            </li>
            <?php
            if (isset($_SESSION['nome'])) {
            ?>
            <li class="nav-item">
                <a class="btnNav" href="logout.php">Desmaterializar</a>
            </li>
            <?php
            }else{
            ?>
            <li class="nav-item">
                <a class="btnNav" href="login.php">Materializar</a>
            </li>
            <?php
            }
            ?>
            
        </ul>
    </nav>
</div>