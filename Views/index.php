<?php
session_start();

require_once "../Models/conexao.php";

require_once "../Models/Cliente_Model.php";
require_once "../Models/Cliente_Service.php";
require_once "../Controllers/ClienteController.php";

require_once "../Controllers/LoginSignInController.php";

require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";

$produtos = ProdutosController::listarProdutos();

if ($_POST) {
  if ($_POST["acao"] == "login") {
    $email = $_POST["emailUsuario"];
    $password = $_POST["senhaUsuario"];

    if($email === "adm" && $password === "adm"){
      header("Location: ./private/loginAdm.php");
    }else {
      $login = LoginController::login($email);
      $nomeUser = ClienteController::getNomeCliente($email);
      $idUser= ClienteController::getIdCliente($email);
    }
  }
}

if(isset($_GET['logoff']) == 1){
 $logoff = LoginController::finalizarSessao();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Compra Certa</title>
  <link rel="icon" href="./img/cc.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  
<!-- ESTILO -->
<style>
  .body{
    background-color: beige;
  }

  .card{
    border-color: orange;
  }

  .nav-link{
    color: white;
  }

  .nav-link:hover{
    color: orange;
  }
</style>

</head>


<body>
  <!-- MENU -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php"><img src="./img/cc1.png"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto" style="width: 40%; margin-left: 10%;">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Página Inicial</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./categorias.php">Categorias</a>
          </li>

          <li class="nav-item">
            <?php if (!isset($_SESSION['user'])) { ?>
              <a class="nav-link" href="./acessoUsuario.php">Minhas Compras</a>
            <?php } else { ?>
              <a class="nav-link" href="./ComprasCliente.php">Minhas Compras</a>
            <?php } ?>
          </li>        
        </ul>

        <u class="navbar-nav" style="margin-right: 10%;">
          <!-- Pesquisar -->
          <li class="nav-item">
            <form method="POST" action="search.php">
              <input style="border-radius: 50px; margin-right: 300px;" text class="form-control" type="search" aria-label="Search" name="search" placeholder="Digite o nome do produto">
            </form>
          </li>

          <!-- CARRINHO -->
          <li class="nav-item">
          <?php if (!isset($_SESSION['user'])) { ?>
            <a class="btn" href="./acessoUsuario.php"><i class="bi bi-cart" style="color: white;"></i></a>
          <?php } else { ?>
            <a class="btn" href="./cart.php"><i class="bi bi-cart" style="color: white;"></i></a>
          <?php } ?>
          </li>

          <!-- LOGIN -->
          <li class="nav-item">
            <?php if (!isset($_SESSION['user'])) { ?>
              <a class="btn" href="./acessoUsuario.php">
                <i class="bi bi-person-circle" style="color: white;"></i>
              </a>
            <?php } else { ?>
              <a class="btn" href="./perfil.php">
                <i class="bi bi-person-circle" style="color: white;"></i>
              </a>
            <?php } ?>
          </li>
        </u>
      </div>
    </div>

    <?php if (!isset($_SESSION['user'])) { ?>
      <?php } else { ?>
        <span style="color: white">Olá, <?php echo $_SESSION['nomeCliente'] ?>
          <a style="color: orange" href="index.php?logoff=1">sair</a></span>
      <?php } ?>
    </nav>

  <!-- CARROSSEL -->
  <div class="container-md"><br>
    <div id="demo1" class="carousel slide" data-bs-ride="carousel">
      <!-- BOTÕES INDICADORES (INFERIOR) -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo1" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo1" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo1" data-bs-slide-to="2"></button>
      </div>

      <!-- IMAGENS -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/slide/1.jpg" class="d-block" style="width:100%">
        </div>

        <div class="carousel-item">
          <img src="./img/slide/2.jpg" class="d-block" style="width:100%">
        </div>

        <div class="carousel-item">
          <img src="./img/slide/3.jpg" class="d-block" style="width:100%">
        </div>
      </div>

      <!-- BOTÃO AVANÇAR/VOLTAR -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo1" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#demo1" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <br>
  <!-- PRODUTOS (BLOCO 1) -->
  <div id="demo" class="carousel" style="width: 100%">
    <div class="container-fluid mt-3" style="width: 75%;">
      <h3>Confira Nossas Promoções</h3><br>
    </div>

    <!-- LISTA PRODUTOS -->
    <div class="carousel-inner">
      <center>
      <div class="carousel-item active">
        <div class="row" style="width: 75%;">

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/oleo.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Óleo de Soja Soya Pet 900ML</p>
                <h5 class="card-title">R$7,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/acucar.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Açúcar Cristal Pinheiro 1KG</p>
                <h5 class="card-title">R$3,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>
            
          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/arroz.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Arroz Parboilizado Urbano Tipo1 1KG</p>
                <h5 class="card-title">R$4,59</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/flocao.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Flocão de Milho Maratá 500G</p>
                <h5 class="card-title">R$1,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/trigo.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Farinha de Trigo Finna c/ Fermento</p>
                <h5 class="card-title">R$5,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>
        </div><br>
      </div>

      <div class="carousel-item">
        <div class="row" style="width: 75%;">

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/cafe.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Café Maratá a Vácuo 250G</p>
                <h5 class="card-title">R$7,49</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/ovo.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Ovos Brancos Grandes c/ 30 Unid</p>
                <h5 class="card-title">R$17,90</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>
          
          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/limao.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Limão Taiti unidade (aprox: 120G)</p>
                <h5 class="card-title">R$0,29</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/azeite.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Azeite de Oliva Extra Virgem 500ML</p>
                <h5 class="card-title">R$24,90</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/ninho.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Leite em Pó Ninho Integral 750G</p>
                <h5 class="card-title">R$29,90</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>
        </div><br>
      </div>
    </center>
    </div>

    <!-- AVANÇAR/VOLTAR PRODUTOS (BLOCO 1) -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <img src="./img/left.png" style="width: 20%;">
    </button>
  
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <img src="./img/right.png" style="width: 20%;">
    </button>
  </div>

  <div class="container-fluid mt-3" style="width: 75%;">
    <h3><center>
      <a href="./produtos.php" class="btn btn-outline-warning" style="width: 330px;">Confira mais produtos</a>
    </center></h3>
    <br>
  </div>

  <?php include("Footer.php"); ?>

</body>
</html>