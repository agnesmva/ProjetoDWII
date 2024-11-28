<?php 
include "functions.php";
include "conection.php";

    autenticar();

$codigo = htmlspecialchars($_GET["codigo"]);

$sql = "SELECT codigo, nome, descricao, categoria, preco_unitario FROM produtos WHERE codigo = :cod;"; //string com o comando SQL a ser executado

$comando = $pdo->prepare($sql);   //montamos e deixamos o SQL preparado

$comando -> bindParam(":cod", $codigo);
$comando->execute();

$res = $comando->fetch(); // utiliza o fetch ao invés do fetchall para pegar apenas um parametro
 var_dump($res);

?>
<main>
        
        <ul>
            <li>Alterar Produto</li>
            <form action="alterar_produto.php" method="POST">
                <div>
                    <input type="hidden" name="codigo" value ="<?= $res["codigo"]?>">
                </div>
                <div>
                    <label for="nameProduct">Nome do Produto</label>
                    <input type="text" name="nameProduct" maxlength="50" value ="<?= $res["nome"]?>" require>
                </div>
                <div>
                    <label for="descriptionProduct">Descrição do Produto</label>
                    <textarea name="descriptionProduct" maxlength="200" value =""id="descriptionProduct" col><?= $res["descricao"]?></textarea>
                </div>
                <div>
                    <label for="priceProduct">Preço: </label>
                    <input type="number" name="priceProduct" id="priceProduct" value ="<?= $res["preco_unitario"]?>" step="any">
                </div>
                <div>
                    <label for="typeProduct">Tipo do Produto</label>
                    <select name="typeProduct" id="typeProduct" require>
                        <option value="" disabled selected>Selecione um Tipo de Produto<option>
                            
                        <option <?= $res["categoria"] == "CD" ? "selected" : "" ?>>CD</option>
                        <option <?= $res["categoria"] == "Livro" ? "selected" : "" ?>>Livro</option>
                        <option <?= $res["categoria"] == "Game" ? "selected" : "" ?>>Game</option>
                        <option <?= $res["categoria"] == "Informática" ? "selected" : "" ?>>Informática</option>
                        <option <?= $res["categoria"] == "DVD" ? "selected" : "" ?>>DVD</option>
                        <option <?= $res["categoria"] == "Mídia Digital" ? "selected" : "" ?>>Mídia Digital</option>
                        <option <?= $res["categoria"] == "Gift Card" ? "selected" : "" ?>>Gift Card</option> <!-- precisou usar assim porque não foi atribuito um value nas opções -->
                    </select>
                </div>
                <div>
                </div>
                <div>
                    <button>Alterar Produto</button>
                </div>
            </form>
            <li><a href="listar_produtos.php">Listar produtos cadastros</a></li>
        </ul>
    </main>