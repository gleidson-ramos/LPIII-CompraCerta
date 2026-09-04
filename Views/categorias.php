<?php
require_once "../Models/conexao.php";
require_once "../Models/Categoria_Model.php";
require_once "../Models/Categoria_Service.php";
require_once "../Controllers/CategoriasController.php";
$categorias = CategoriasController::listarCategorias();
include("Head.php");
?>

<style>
  .body{background-color: beige;}
  .card{border-color:bisque; text-align: center; border-width: 1px; margin-top: 10%; margin-left: 10%;}
  a{text-decoration: none; color: black;}
  a:hover{text-decoration: none; color:coral;}
  .card:hover{ border-color: orangered; opacity: 0.7; border-width: 2px; border-style: dotted; padding: 2%;}
  .nav-link{color: white;}
  .nav-link:hover{color: orange;}
  .card-title{margin-top: 10%;}
</style>

<br>
<center>
  <h3>Categorias</h3>
      <div class="row" style="width: 75%;" >
          <br>
          <?php foreach ($categorias as $categoriaProduto) {?>
            <div class="col-md-4">
              <div class="card" style="width: 250px;">
                <a href="./<?= $categoriaProduto->getNomeCategoria() ?>.php">
                <img class="card-img-top" src="<?= $categoriaProduto->getImgCategoria() ?>">
                  <div class="card-img-overlay">
                    <h4 class="card-title"><?= $categoriaProduto->getNomeCategoria() ?></h4>
                  </div>
                </a>
              </div> 
            </div>
          <?php } ?> 
        </div>
</center>
<br>

<?php include("Footer.php"); ?>
</body>
</html>