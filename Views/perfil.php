<?php
require_once "../Controllers/perfilControlador.php";
?>

<!DOCTYPE html>
<html>
<body>
<?php foreach ($users as $user): ?>
    <?php if ($user['idUsuario'] != $userId):?>

<div class="container h-100" style="margin-block: 1%;">
    <div class="card-wrapper">
        <div class="card fat">
            <div class="card-body">
                <?php echo $user['idUsuario']; ?>
                    <center><h2>Olá, <?php echo $user['nomeUsuario'];?>.</h2></center><br>
                <div class="form-row">                   
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Nome Completo</label>
                        <input type="text" class="form-control" disabled id="nomeUsuario" placeholder="<?php echo $user['nomeUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nome-pagamento">CPF</label>
                        <input type="text" class="form-control" disabled id="cpfUsuario" placeholder="<?php echo $user['cpfUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome-pagamento">Email</label>
                        <input type="text" class="form-control" disabled id="emailUsuario" placeholder="<?php echo $user['emailUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-2">
                        <label for="nome-pagamento">Telefone</label>
                        <input type="text" class="form-control" disabled id="telefoneUsuario" placeholder="<?php echo $user['telefoneUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Endereço</label>
                        <input type="text" class="form-control" disabled id="enderencoUsuario" placeholder="<?php echo $user['enderecoUsuario']; ?>" required autofocus>
                    </div>

                    
                    <br><br>
                    <center>
                    <form method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user['idUsuario']; ?>">
                        <a href='./perfil-editar.php'>
                            <button type="submit" class="btn btn-warning btn-block" style=" font-size: 25px;">
                                <span style="color: white">Editar Perfil</span></a>
                            </button>
                        
                            <button type="submit" name="delete_user"class="btn btn-danger btn-block" style=" font-size: 25px;">
                                Excluir Perfil
                            </button>
                    </form>
                    </center>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require "Footer.php"; ?>

</body>
</html>