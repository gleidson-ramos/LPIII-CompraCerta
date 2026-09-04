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

<div class="carousel-inner text-center">
  <center>
  <div class="row" style="width: 75%;" >
    <?php
    if (isset($produtos) && is_array($produtos) && count($produtos) > 0) {
      shuffle($produtos);

      foreach ($produtos as $produto) { 
        $preco = number_format($produto->getPreco(), 2, ',', '.');
    ?>


          <br>
          <div class="card" style="width: 20%;">
            <form action="cart.php" method="post">
              <img class="card-img-top" src="<?= $produto->getUrlImagem() ?>" width="200px" alt="Card image">
              <div class="card-body">
                <input type="hidden" name="acao" value="addItem">
                <input type="hidden" name="preco" value="<?= $produto->getPreco() ?>">
                <input type="hidden" name="idProduto" value="<?= $produto->getId() ?>">
                <p class="card-text"><?= $produto->getNome() ?></p>
                <h5 class="card-title">R$<?= $preco ?></h5>
                <button type="submit" class="btn btn-outline-warning">Comprar</button>
              </div>
            </form>  
          </div>            
          <?php
          }
          }else{
            echo "<p>Nenhum produto encontrado.</p>";
          }
          ?>
    </div>
    <br><br>
    </center>
</div>
</body>
