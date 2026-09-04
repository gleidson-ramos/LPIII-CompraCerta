<?php
require_once "../Models/conexao.php";
require_once "../Models/Compras_Model.php";
require_once "../Models/Compras_Service.php";
require_once "../Controllers/ComprasController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idPedido']) && isset($_POST['status'])) {
        $idPedido = $_POST['idPedido'];
        $status = $_POST['status'];
        
        ComprasController::atualizarStatus($idPedido, $status);
        
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}
