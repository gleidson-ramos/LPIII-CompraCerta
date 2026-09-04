<?php

require_once "../Models/conexao.php";
require_once "../Models/PedidoItem_Model.php";
require_once "../Models/PedidoItem_Service.php";

class ProdutosController{

  public static function listarProdutos() {
    $produtoService = new ProdutoService();

    $produtos = $produtoService -> getProdutos();
    return $produtos;
  }

  public static function listarProdutosByCategoria($categoria) {
    $produtoService = new ProdutoService();

    $produtos = $produtoService -> getProdutosByCategoria($categoria);
    return $produtos;
  }

}

?>