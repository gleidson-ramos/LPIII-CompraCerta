<?php

class LoginController{
    public static function login($email){
        $email = $_POST['emailUsuario'];

        $clienteService = new ClienteService;
        if ($clienteService->checkEmail($_POST['emailUsuario']) == 'falso') {
            echo '<script> alert("Usuario não existe") </script>';
            echo '<script> window.location.href="acessoUsuario.php"; </script>';
        } else {
            if ($clienteService->checkSenha($_POST['emailUsuario']) == false) {
                echo '<script> alert("Senha incorreta")</script>';
                echo '<script> window.location.href="acessoUsuario.php"; </script>';
            } else {
                $_SESSION['user'] = $clienteService->getCliente($email);
            }
        }        
    }

    public static function finalizarSessao(){
        unset($_SESSION);
        session_destroy();
        header("Location: ../Views/acessoUsuario.php");
      }

    public static function validarLoginCliente() {
        if(!$_SESSION["user"]) {
          header("Location: ../Views/acessoUsuario.php");
        }
      }
}