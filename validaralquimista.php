<?php
    session_start();

    include 'connection/conexao.php';

    $usuario = htmlspecialchars($_POST['usuario']);
    $senha = md5(htmlspecialchars($_POST['senha']));

    $sql = 'SELECT * FROM cliente WHERE username = :usuario AND senha = :senha';

    $command = $pdo->prepare($sql);
    $command->bindParam(":usuario", $usuario);
    $command->bindParam(":senha", $senha);
    $command->execute();
    $cliente = $command->fetch();

    if(isset($cliente['id'])){
        $_SESSION['idAlquimista'] = $cliente['id'];
        $_SESSION['nomeAlquimista'] = $cliente['nome'];
        header("Location: index.php");
    }else{
        include 'components/head.php';
        include 'components/header.php';
?>
<main>
    <div class="container-fluid usuarioNaoEncontrado">
        <?php
            $size = 2;
            $title = 'O eco de seu nome se perde nos corredores do tempo.';
            include 'components/centertitle.php';
        ?>
        <div class="row align-items-center justify-content-center centertitle">
            <div class="col-6 align-items-center justify-content-center text-center">
                <a class="btnVoltarLogin" href="login.php">A alquimia exige paciência. Realize outra materialização.</a>
            </div>
        </div>
    </div>
</main>
<?php
    }
    include 'components/footer.php';
    include 'components/foot.php';
?>