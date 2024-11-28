<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>FatecShop - Admin</title>
</head>
<body>
    <header> <h1>Área Administrativa</h1></header>
    <main>
       
        <form action="validate.php" method="POST">
            <div>
                <label for="login">Login</label>
                <input type="text" name="username" placeholder="insira seu login" require>
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="password" placeholder="insira sua senha" require>
            </div>
            <div>
                <button>Enviar</button>
            </div>
        </form>
    </main>
    <footer></footer>
</body>
</html>