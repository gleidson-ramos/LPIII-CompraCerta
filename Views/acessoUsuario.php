<?php
require_once "../Controllers/ClienteController.php";
require_once "../Controllers/UsuarioController.php";

include("Head.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css" rel="stylesheet">
    <title>Login</title>
    <link rel="icon" href="./img/cc.png">
</head>

<body>
<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class="col-12 text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    
                <h6 class="mb-0 pb-3"><span>Entrar</span><span>Cadastrar</span></h6>
                <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                <label for="reg-log"></label>

                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">

                                    <h4 class="mb-4 pb-3">Entrar</h4>
                                    <form  action="index.php" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="acao" value="login">
                                        <div class="form-group mt-2">
                                            <input id="emailUsuario" type="email" name="emailUsuario" class="form-style" placeholder="Email" value="" autocomplete="off" required autofocus>
                                            <i class="input-icon bi bi-envelope-at"></i>
                                        </div>

                                        <div class="form-group mt-2">
                                            <input type="password" name="senhaUsuario" class="form-style" placeholder="Senha" id="senhaUsuario" autocomplete="off" required data-eye>
                                            <i class="input-icon bi bi-lock"></i>
                                        </div>
                                        <button type="submit" class="btn mt-4">Entrar</button>
                                    </form>
                                    <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Esqueceu a senha?</a></p>
                                </div>
                            </div>
                        </div>
</div>
                    
        <div class="card-back">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Cadastrar</h4>
                                            <form method="POST" action="cadastrar.php">
                                                <div class="form-group">
                                                    <input type="text" name="nomeUsuario" class="form-style" placeholder="Nome Completo" id="nomeUsuario" autocomplete="off">
                                                    <i class="input-icon bi bi-person"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="number" name="cpfUsuario" class="form-style" placeholder="CPF" id="cpfUsuario" autocomplete="off">
                                                    <i class="input-icon bi-person-vcard-fill"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="emailUsuario" class="form-style" placeholder="Email" id="emailUsuario" autocomplete="off">
                                                    <i class="input-icon bi bi-envelope-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="number" name="telefoneUsuario" class="form-style" placeholder="Telefone" id="telefoneUsuario" autocomplete="off">
                                                    <i class="input-icon bi bi-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="enderecoUsuario" class="form-style" placeholder="Endereço" id="enderecoUsuario" autocomplete="off">
                                                    <i class="input-icon bi bi-geo-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="senhaUsuario" class="form-style" placeholder="Sua Senha" id="senhaUsuario" autocomplete="off">
                                                    <i class="input-icon bi bi-lock"></i>
                                                </div>

                                                <button type="submit" name="register_submit" class="btn mt-4">Cadastrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>