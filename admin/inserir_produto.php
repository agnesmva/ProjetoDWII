<?php 
include "include/functions.php";
autenticar();
include "include/head.php";
?>
    <main>
        
        <ul>
            <li>Cadastrar Produtos</li>
            <form action="cadastrar_produto.php" method="POST">
                <div>
                    <label for="nameProduct">Nome do Produto</label>
                    <input type="text" name="nameProduct" maxlength="50" require>
                </div>
                <div>
                    <label for="descriptionProduct">Descrição do Produto</label>
                    <textarea name="descriptionProduct" maxlength="200" id="descriptionProduct" col></textarea>
                </div>
                <div>
                    <label for="priceProduct">Preço: </label>
                    <input type="number" name="priceProduct" id="priceProduct">
                </div>
                <div>
                    <label for="typeProduct">Tipo do Produto</label>
                    <select name="typeProduct" id="typeProduct" require>
                        <option value="" disabled selected>Selecione um Tipo de Produto<option>
                            
                        <option>CD</option>
                        <option>Livro</option>
                        <option>Game</option>
                        <option>Informática</option>
                        <option>DVD</option>
                        <option>Mídia Digital</option>
                        <option>Gift Card</option>
                    </select>
                </div>
                <div>
                    <button>Cadastrar Produto</button>
                </div>
            </form>
            <li><a href="listar_produtos.php">Listar produtos cadastros</a></li>
        </ul>
    </main>
    <footer></footer>
</body>
</html>