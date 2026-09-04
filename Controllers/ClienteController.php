<?php

class ClienteController{

  public static function createIfNotExists($idCliente) {
    $idCliente = $_SESSION['idCliente'];

    $pedidoService = new PedidoService();
    $pedido = $pedidoService -> getLastUserPedido($idCliente);

    if(($pedido != null) && ($pedido -> getStatus() != "Aberto")) {
      $pedido = $pedidoService -> create(new PedidoModel($idCliente, "Aberto"));
    }

    return $pedido;
  }

  public static function deleteWhenEmpty($pedido) {
    $pedidoService = new PedidoService();
    $pedidoItemService = new PedidoItemService();

    $pedidos = $pedidoItemService -> getPedidosItemByIdPedido($pedido);

    if (count($pedidos) == 0) {
      $pedidoService -> delete($pedido);
    }
  }

  public static function getPedidosByUser() {
    $userId = 3;
    
    $pedidoService = new PedidoService();
    $data = $pedidoService -> getPedidosByUser($userId);

    $openPedidos = array();
    $otherPedidos = array();
    
    foreach ($data as $pedido) {
      if ($pedido -> getStatus() != "Entregue") {
        array_push($openPedidos, $pedido);
      } else {
        array_push($otherPedidos, $pedido);
      }
    }

    $pedidos= array('open' => $openPedidos, 'history' => $otherPedidos );
    
    return $pedidos;
    
  }

  public static function getCliente($email)
  {
    $user = ClienteService::getCliente($email);
    return $user;
  }

  public static function getNomeCliente($email)
  {
    $user = ClienteService::getNomeCliente($email);
    return $user;
  }

  public static function getIdCliente($email){
    $user = ClienteService::getIdCliente($email);
    return $user;
  }

  public static function getClientes() {
    $clienteService = new ClienteService();
    $allClientes = $clienteService->getClientes();

    return $allClientes;
  }

}

?>