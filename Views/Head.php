<?php
session_start();
require_once "../Models/conexao.php";
require_once "../Models/Cliente_Model.php";
require_once "../Models/Cliente_Service.php";
require_once "../Controllers/LoginSignInController.php";
require_once "../Controllers/ClienteController.php";


if ($_POST && isset($_POST["acao"])) {
  if ($_POST["acao"] == "login") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $login = LoginController::login($email);
    $nomeUser = ClienteController::getNomeCliente($email);
    $idUser = ClienteController::getIdUser($email);
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
          <a class="btn" href="./acessoUsuario.php"><i class="bi bi-person-circle" style="color: white;"></i></a>
        <?php } else { ?>
          <a class="btn" href="./perfil.php"><i class="bi bi-person-circle" style="color: white;"></i></a>
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