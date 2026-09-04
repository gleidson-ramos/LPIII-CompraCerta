<?php

class PedidoController{
  public static function createIfNotExists($idCliente) {

    $pedidoService = new PedidoService();
    $pedido = $pedidoService -> getLastUserPedido($idCliente);

    if(($pedido != null) && ($pedido -> getStatus() != "Aguardando Atendimento")) {
      $pedido = $pedidoService -> create(new PedidoModel($idCliente, "Aguardando Atendimento"));
    }

    return $pedido;
  }

  // Excluir Pedido
  public static function deleteWhenEmpty($pedido) {
    $pedidoService = new PedidoService();
    $pedidoItemService = new PedidoItemService();

    $pedidos = $pedidoItemService -> getPedidosItemByIdPedido($pedido);

    if (count($pedidos) == 0) {
      $pedidoService -> delete($pedido);
    }
  }

  public static function getPedidosByUser($idCliente) {
    $idCliente = $_SESSION["idCliente"];
    $pedidoService = new PedidoService();
    $data = $pedidoService -> getPedidosByUser($idCliente);

    $openPedidos = array();
    $otherPedidos = array();
    
    foreach ($data as $pedido) {
      if ($pedido -> getStatus() != "Compra Entregue") {
        array_push($openPedidos, $pedido);
      } else {
        array_push($otherPedidos, $pedido);
      }
    }

    $pedidos= array('open' => $openPedidos, 'history' => $otherPedidos );
    
    return $pedidos;
    
  }

  public static function getPedidos() {
    $pedidoService = new PedidoService();
    $allPedidos = $pedidoService->getPedidos();

    $activePedidos = array();

    foreach ($allPedidos as $pedido) {
      if ($pedido->getStatus() != "Compra Entregue" && $pedido->getStatus() != "Aguardando Atendimento") {
        array_push($activePedidos, $pedido);
      }
    }


    return array('all' => $allPedidos, 'active' => $activePedidos);
  }



  
}

?>