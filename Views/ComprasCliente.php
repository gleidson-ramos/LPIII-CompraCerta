<?php

include("Head.php");

require_once "../Models/conexao.php";
require_once "../Models/Pedido_Model.php";
require_once "../Models/Pedido_Service.php";
require_once "../Controllers/PedidoController.php";

$idCliente = $_SESSION['idCliente'];
$pedido = PedidoController::getPedidosByUser($idCliente);

$open = $pedido["open"];
$history = $pedido["history"];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="./style/star.css">
</head>

<body>

  <section class="h-100">
    <div class="container h-100" style="margin-block: 1%;">
      <div class="row">
        <div class="col mb-5">
          <h2 style="padding-top: -15px; margin-bottom: -30px; margin-top: 30px;">Pedidos em Andamento</h2>
        </div>
      </div>
      <div class="row justify-content-center h-100">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Data</th>
              <th scope="col">Hora</th>
              <th scope="col">Status</th>
              <th scope="col">Avaliar</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach ($open as $pedido) {
              $dataHora = explode(' ', $pedido->getDataDaCompra());
              $hora = $dataHora["1"];
              $data = explode('-', $dataHora["0"]);
              $data = implode('/', array_reverse($data));
          ?>
            <tr>
              <th style="font-size: 25px; color: orange;" scope="row">#<?= $pedido -> getId()?></th>
              <td><?= $data ?></td>
              <td><?= $hora ?></td>
              <td><?= $pedido -> getStatus() ?></td>
              <td>
                <div class="rating">
                  <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>


          <div class="col mb-8">
          <h2 style="padding-top: -15px; margin-bottom: 10px; margin-top: 30px;">Históricos de Pedidos</h2>
          </div>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Data</th>
              <th scope="col">Hora</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <?php 
            foreach ($history as $pedido) {
              $dataHora = explode(' ', $pedido->getDataDaCompra());
              $hora = $dataHora["1"];
              $data = explode('-', $dataHora["0"]);
              $data = implode('/', array_reverse($data));
          ?>
              <th style="font-size: 25px; color: orange;" scope="row">#<?= $pedido -> getId()?></th>
              <td><?= $data ?></td>
              <td><?= $hora ?></td>
              <td><?= $pedido -> getStatus() ?></td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="dropdown">
                    Lista de Produtos
                  </button>
                  <ul class="dropdown-menu">
                    <li><h4 class="dropdown-header"><center>Lista de Produtos</center></h4></li>
                    <li><h6 class="dropdown-item"><h9 style="color: grey;">3x</h9> Produto 1</li>
                  </ul>
                </div>
              </td>
              <td><a href="" class="btn btn-outline-warning">Refazer Pedido</a></td>

          <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
    


</body>
</html>