<?php 
require_once "../Controllers/perfilControlador.php";
?>

<!DOCTYPE html>
<html>
<body>
<?php foreach ($users as $user): ?>
<div class="container h-100" style="margin-block: 1%;">
    <div class="card-wrapper">
        <div class="card fat">
            <div class="card-body">
            <center><h2>Editar o perfil de <?php echo $user['nomeUsuario']; ?>.</h2></center><br>
                <?php if ($user['idUsuario'] != $userId): ?>
                <div class="form-row">
                <form method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user['idUsuario']; ?>">
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Nome Completo</label>
                        <input type="text" class="form-control" name="nomeUsuario" value="<?php echo $user['nomeUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nome-pagamento">CPF</label>
                        <input type="text" class="form-control" name="cpfUsuario" value="<?php echo $user['cpfUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome-pagamento">Email</label>
                        <input type="text" class="form-control" name="emailUsuario" value="<?php echo $user['emailUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-2">
                        <label for="nome-pagamento">Telefone</label>
                        <input type="text" class="form-control" name="telefoneUsuario" value="<?php echo $user['telefoneUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Endereço</label>
                        <input type="text" class="form-control" name="enderecoUsuario" value="<?php echo $user['enderecoUsuario']; ?>" required autofocus>
                    </div>

                    
                    <br><br>
                    <center>
                    <input type="hidden" name="user_id" value="<?php echo $user['idUsuario']; ?>">
                        <a href='./perfil.php'>
                            <button type="submit" class="btn btn-warning btn-block" style=" font-size: 25px;">
                                <span style="color: white">Cancelar</span></a>
                            </button>
                            
                            <button type="submit" name="save_user"class="btn btn-success btn-block" style=" font-size: 25px;">
                                Salvar
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