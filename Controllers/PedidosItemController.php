<?php

class PedidosItemController{
  public static function addItem($pedidoItem) {
    $pedidoItemService = new PedidoItemService();
    $pedidoItem = $pedidoItemService -> create($pedidoItem);
  }

  public static function removeItem($pedidoItem) {
    $pedidoItemService = new PedidoItemService();
    $pedidoItemService -> delete($pedidoItem);
  }

  public static function updateQuantity($pedidoItem){
    $pedidoItemService = new PedidoItemService();
    $pedidoItemService->updateQuantity($pedidoItem);
  }

  public static function listPedidoItems($pedido) {
    $pedidoItemService = new PedidoItemService();
    $pedidoItems = $pedidoItemService -> getPedidosItemByIdPedido($pedido);

    return $pedidoItems;
  }

}

?>