<?php

require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";

include("Head.php");
?>

<style>
  .body{
    background-color: beige;
  }

  .card{
    border-color: orange;
    margin-left: 15px;
    margin-top: 15px;
  }

  .nav-link{
    color: white;
  }

  .nav-link:hover{
    color: orange;
  }
</style>

<body id="produtos">



<div id="demo" class="carousel" style="width: 100%">
  <div class="container-fluid mt-3" style="width: 75%;">
    <h3>Resultado da Pesquisa</h3>
  </div>

  <div class="carousel-inner">
    <center>
    <div class="row" style="width: 75%;">
      <?php if(isset($produtos) && count($produtos) > 0): ?>
        <?php foreach($produtos as $produto): ?>
            <div class="card" style="width: 18%;"><br>
            <form action="cart.php" method="post">
              <img class="card-img-top" src="<?= $produto->getUrlImagem()?>" alt="Card image">
              <div class="card-body">
                <input type="hidden" name="acao" value="addItem">
                <input type="hidden" name="preco" value="<?= $produto->getPreco()?>">
                <input type="hidden" name="idProduto" value="<?= $produto->getId()?>">
                <p class="card-text"><?= $produto->getNome()?></p>
                <h5 class="card-title">
                  <input type="hidden" name="precoProduto" value="">R$<?= $produto->getPreco()?></h5>
                <button type="submit" class="btn btn-outline-warning">Comprar</button>
              </div>
            </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?><br><br>
  </center>
  </div>
  <?php include("Footer.php"); ?>

</body>
</html>