<?php 
include "include/header.php"; 
include "include/head.php"; 

?>
    <main class="login">
        <section><img src="https://i.etsystatic.com/19827764/r/il/9ccf9d/2406867836/il_1140xN.2406867836_159k.jpg" alt=""></section>
        <form action="processamento/validarLogin.php" method="POST">
            <div>
                <p>Login Administração</p>
            </div>
            <div>
                <label for="login">
                <i class="bi bi-person-circle"></i>
                <input type="text" name="username" placeholder="username" required>
                </label>
                
            </div>
            <div>
                <label for="senha">
                <i class="bi bi-key"></i>
                <input type="password" name="senha" id="senha" placeholder="senha" required >
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