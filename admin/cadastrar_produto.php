<?php

include "processamento/functions.php";
include "../connection/conexao.php";
$codigo = htmlspecialchars($_GET["codigo"]);

$sql = "SELECT id, nome, descricao, tipo, preco_unitario FROM produtos WHERE id = :cod;"; //string com o comando SQL a ser executado

$comando = $pdo->prepare($sql);   //montamos e deixamos o SQL preparado

$comando -> bindParam(":cod", $codigo);
$comando->execute();

$res = $comando->fetch();
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
                            
                        <option>Poção</option>
                        <option>Ingredientes</option>
                    </select>
                </div>
                <div>
                    <button>Cadastrar Produto</button>
                </div>
            </form>
            <li><a href="listar_produtos.php">Listar produtos cadastros</a></li>
        </ul>
    </main>