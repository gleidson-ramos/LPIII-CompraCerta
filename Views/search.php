<?php
require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";

if(isset($_POST['search'])){
    $searchTerm = $_POST['search'];

    $conexao = Conexao::conectar();
    $sql = "SELECT * FROM produtos WHERE nomeProduto LIKE '%$searchTerm%'";

    $stmt = $conexao -> prepare($sql);
    $stmt -> execute();

    $produtos = array();

    while ($data = $stmt -> fetch()) {
        $currentProduto = new ProdutoModel($data["nomeProduto"], $data["precoProduto"], $data["urlimagemProduto"], $data["CategoriaProduto"]);
        $currentProduto->setId($data["idProduto"]);

        array_push($produtos, $currentProduto);
    }
}

include 'pesquisa.php';
?>
