<?php

class ComprasModel{
    private $idPedido;
    private $status;
    private $dataDaCompra;

    public function __construct($status, $dataDaCompra){
        $this->status = $status;
        $this->dataDaCompra = $dataDaCompra;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getDataDaCompra() {
        return $this->dataDaCompra;
    }

    public function setDataDaCompra($dataDaCompra) {
        $this->dataDaCompra = $dataDaCompra;
    }

    public static function getComprass(){
        return ComprasService::getComprass();
    }

    public static function getComprasByStatus() {
        return ComprasService::getComprasByStatus();
    }

    public static function atualizarStatus($idPedido, $status) {
        return ComprasService::atualizarStatus($idPedido, $status);
    }
    



}

?>