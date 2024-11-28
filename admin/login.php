<?php 
include "include/header.php"; 
include "include/head.php"; 
include "processamento/validarLogin.php"
?>
    <main class="login">
        <section></section>
        <form action="processamento/validarLogin.php" method="POST">
            <div>
                <p>Login Administração</p>
            </div>
            <div>
                <label for="login">
                <i class="bi bi-person-circle"></i>
                <input type="text" name="username" placeholder="username" require>
                </label>
                
            </div>
            <div>
                <label for="senha">
                <i class="bi bi-key"></i>
                <input type="password" name="senha" id="senha" placeholder="senha" require >
                </label>
                
            </div>
            <div>
                <button>Gerenciar</button>
                <p>Não possui login?</p>
                
            </div>
            <div>
            <a href="cadastro.php">Criar uma conta</a> 
            </div>
        </form>
    </main>
<?php include "include/footer.php"; ?>