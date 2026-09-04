<?php
require_once "../Models/conexao.php";

class ComprasController{
  public static function listarCompras() {
    $comprasService = new ComprasService();
    $compras = $comprasService -> getComprass();
    return $compras;
  }

  public static function listarComprasByStatus($status) {
    $comprasService = new ComprasService();
    $compras = $comprasService->getComprasByStatus($status);
    return $compras;
  }

  public static function atualizarStatus($idPedido, $status) {
    ComprasService::atualizarStatus($idPedido, $status);
  }

  public static function listarStatusByName($status) {
    $comprasService = new ComprasService();
    $compras = $comprasService->getStatus($status);
    return $compras;
  }



}

?>