<?php
require_once '../Controllers/UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioController = new UsuarioController();
    $usuarioController->cadastrar($_POST);

    header("Location: ../Views/acessoUsuario.php");
}

?>
