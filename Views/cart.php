<?php
if(!isset($_SESSION)){
session_start();
}
require_once "../Models/conexao.php";

require_once "../Models/Pedido_Model.php";
require_once "../Models/Pedido_Service.php";
require_once "../Controllers/PedidoController.php";

require_once "../Models/PedidoItem_Model.php";
require_once "../Models/PedidoItem_Service.php";
require_once "../Controllers/PedidosItemController.php";

$idCliente=$_SESSION['idCliente'];

$pedido = PedidoController::createIfNotExists($idCliente);
$idPedido = $pedido->getId();

$_SESSION['idPedido'] = $idPedido;

$pedidoItems = PedidosItemController::listPedidoItems($pedido);

if ($_POST) {
  if ($_POST["acao"] == "addItem") {
    $preco = $_POST["preco"];
    $idProduto = $_POST["idProduto"];
    $pedidoItem = new PedidoItemModel($idProduto, $preco, 1, $idPedido);
    PedidosItemController::addItem($pedidoItem);

  } else if ($_POST["acao"] == "removeItem") {
    $pedidoItem = $pedidoItems[$_POST["itemIndex"]];
    $idPedidoItem = $pedidoItem["idPedidoItem"];
    $idProduto = $pedidoItem["idProduto"];
    $preco = $pedidoItem["precoPedido"];
    $quantidade = $pedidoItem["quantidadePedido"];

    $pedidoItem = new PedidoItemModel($idProduto, $preco, $quantidade, $idPedido);
    $pedidoItem -> setId($idPedidoItem);

    PedidosItemController::removeItem($pedidoItem);
    PedidoController::deleteWhenEmpty($pedido);
  } else if ($_POST["acao"] == "changeQuantity") {
    $idPedidoItem = $_POST["idPedidoItem"];
    $quantidade = $_POST["quantity"];

    $pedidoItem = new PedidoItemModel('', '', $quantidade, '');
    $pedidoItem -> setId($idPedidoItem);
    
    PedidosItemController::updateQuantity($pedidoItem);
  }
  header("Refresh:0");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>CompraCerta - Meu carrinho</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>


<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <a style="text-decoration: none;" href="produtos.php"><button style="font-size: 25px;" type="button" class="btn btn-warning btn-lg btn-block">Continuar comprando</button></a>
              <hr>
              
              <?php
              $total = 0;
              if (empty($pedidoItems)) {
                echo '<div class="alert alert-info">Seu carrinho está vazio.</div>';
              } else {
                foreach ($pedidoItems as $index => $pedidoItem) {
                  $preco = number_format($pedidoItem["precoPedido"], 2, ',', '.');
                  $subtotal = $pedidoItem["precoPedido"] * $pedidoItem["quantidadePedido"];
                  $total += $subtotal;

                  $fsubtotal = number_format($subtotal, 2, ',', '.');
                  $ftotal = number_format($total, 2, ',', '.');
                ?>


                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                        <img class="img-fluid mx-auto d-block image" src="<?= $pedidoItem['urlimagemProduto'] ?>"
                            style="width: 75px;">
                        </div>
                        <div class="ms-3">
                          <h5><?= $pedidoItem["nomeProduto"] ?></h5>
                          <p class="small mb-0">Preço Unitário: R$<?= $preco ?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                      <h5 class="fw-normal mb-0">
                        <form method="post">
                          <input type="hidden" name="acao" value="changeQuantity">
                          <input type="hidden" name="idPedidoItem" value="<?= $pedidoItem['idPedidoItem'] ?>">
                            <div class="d-flex align-items-center">
                              <input id="quantity" type="number" name="quantity" value="<?= $pedidoItem['quantidadePedido'] ?>" min="1" class="form-control quantity-input" style="width: 65px;">
                              <button type="submit" class="btn" href="" style="color: orange;"><i class="fas fa-check"></i></button>
                            </div>
                        </form>
                      </h5>

                        
                        <div style="width: 80px;">
                          <h6 class="mb-0">R$<?= $fsubtotal ?></h6>
                        </div>

                        <form method="POST">
                          <input type="hidden" name="acao" value="removeItem">
                          <input type="hidden" name="itemIndex" value="<?= $index ?>">
                          <button type="submit" class="btn" href="" style="color: orange;">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <?php } ?>
                  <h5 class="mb-3" style="text-align:right">
                    Preço Total: R$<?= $ftotal ?>
                  </h5>
                <?php } ?>
                

              </div>






              <div class="col-lg-5">

                <div class="card bg-danger text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Detalhes do Pagamento</h5>
                    </div>

                    <p class="small mb-2">Meios de Pagamento</p>
                    <i class="fab fa-cc-mastercard fa-2x me-2"></i>
                    <i class="fab fa-cc-visa fa-2x me-2"></i>
                    <i class="fab fa-cc-amex fa-2x me-2"></i>
                    <i class="fab fa-cc-paypal fa-2x"></i>
                  
                    <form class="mt-4">
                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Nome Completo" />
                        <label class="form-label" for="typeName">Nome no Cartão</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Numero do Cartão</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="MÊS/ANO" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Data de Validade</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline form-white">
                            <input type="password" id="typeText" class="form-control form-control-lg"
                              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                            <label class="form-label" for="typeText">CVV</label>
                          </div>
                        </div>

                      </div>
                    </form>

                      <input type="hidden" name="idPedido" value="<?= $_SESSION['idPedido'] ?>">
                      <a style="text-decoration: none;" href="endereco.php" type="button" class="btn btn-warning btn-lg btn-block">Finalizar compra</button></a>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
