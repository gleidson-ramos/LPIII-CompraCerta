<?php
require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";

$produtos = ProdutosController::listarProdutos();

include("Head.php");
?>

<style>
  .body{ background-color: beige; }

  .card{border-color: orange; margin-left: 15px; margin-top: 15px;}

  .nav-link{color: white;}

  .nav-link:hover{color: orange;}
</style>

<body>
<div id="demo" class="carousel" style="width: 100%">
  <div class="container-fluid mt-3" style="width: 75%;">
    <h3>Confira Nossas Ofertas</h3>
  </div>
 
  <!-- LISTA PRODUTOS -->
  <div class="carousel-inner">
    <center>
        <div class="row" style="width: 75%;">
        <?php
        if(isset($produtos)) {shuffle($produtos);}
        foreach ($produtos as $produto) { 
          $preco = number_format($produto->getPreco(), 2, ',', '.');
        ?>
            <br><div class="card" style="width: 20%;">
            <form action="cart.php" method="post">
              <img class="card-img-top" src="<?= $produto->getUrlImagem() ?>" width="200px" alt="Card image">
              <div class="card-body">
                <input type="hidden" name="acao" value="addItem">
                <input type="hidden" name="preco" value="<?= $produto->getPreco() ?>">
                <input type="hidden" name="idProduto" value="<?= $produto->getId() ?>">
                <p class="card-text"><?= $produto->getNome() ?></p>
                <h5 class="card-title">R$<?= $preco ?></h5>
                <button type="submit" class="btn btn-outline-warning">Comprar</button>
                </form>  
              </div>
            </div><?php } ?>

        </div>
        <br>
      <br>
    </center>
  </div>
  <?php include("Footer.php"); ?>
</body>
</html>
  