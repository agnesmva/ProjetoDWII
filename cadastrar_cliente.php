<?php
include "connection/conexao.php";
   
    $nomeUsuario = htmlspecialchars($_POST["nome"]);
    $telefoneUsuario = htmlspecialchars($_POST["telefone"]);
    $emailUsuario = htmlspecialchars($_POST["email"]);
    $usernameUsuario = htmlspecialchars($_POST["username"]);
    $senhaUsuario = md5(htmlspecialchars($_POST["senha"]));
    // $enderecoUsuario = intval($_POST["endereco"]);
    $enderecoUsuario = 1;


    $sql = "INSERT INTO cliente (nome,telefone,email,username,senha,id_endereco) VALUES  (:nomeUsuario, :telefoneUsuario, :emailUsuario, :usernameUsuario, :senhaUsuario, :enderecoUsuario)";

    $command = $pdo->prepare($sql);
    $command->bindParam(":nomeUsuario", $nomeUsuario);
    $command->bindParam(":telefoneUsuario", $telefoneUsuario);
    $command->bindParam(":emailUsuario", $emailUsuario);
    $command->bindParam(":usernameUsuario", $usernameUsuario);
    $command->bindParam(":senhaUsuario", $senhaUsuario);
    $command->bindParam(":enderecoUsuario", $enderecoUsuario);
    $sucesso = $command->execute();

    if($sucesso) {
       header("location: login.php");
    }else {
        include 'components/head.php';
        include 'components/header.php';
?>
<main>
    <div class="container-fluid cadastroNaoSucedido">
        <?php
            $size = 2;
            $title = 'Uma força mágica desconhecida impediu a criação de seu perfil. Verifique se todos os campos estão preenchidos corretamente.';
            include 'components/centertitle.php';
        ?>
        <div class="row align-items-center justify-content-center centertitle">
            <div class="col-6 align-items-center justify-content-center text-center">
                <a class="btnVoltarSignin" href="form_cadastro_clientes.php">A alquimia exige paciência. Realize outra transmutação.</a>
            </div>
        </div>
    </div>
</main>
<?php
    }
    include 'components/footer.php';
    include 'components/foot.php';
?>