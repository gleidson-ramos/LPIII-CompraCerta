<?php
require_once "../Controllers/perfilControlador.php";

/*if ($_POST["acao"] == "addEndereco") {
    $idPedido = $_SESSION['idPedido'];
    $endereco = $_POST["enderencoUsuario"];
    $addendereco = new PedidoItemModel($idPedido, $endereco);
    PedidoController::addEndereco($addendereco);
}*/
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
                    <center><h2>Confirmação de Endereço.</h2><br>
                <div class="form-row" method="POST">
				<input type="hidden" name="idPedido" value="<?= $_SESSION['idPedido'] ?>">
                   
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Nome Completo</label>
                        <input type="text" class="form-control" disabled id="nomeUsuario" placeholder="<?php echo $user['nomeUsuario']; ?>" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome-pagamento">Endereço</label>
                        <input type="text" class="form-control" id="enderencoUsuario" placeholder="<?php echo $user['enderecoUsuario']; ?>" required autofocus>
                    </div>

                    <br>
					<input type="hidden" name="acao" value="addEndereco">
					<a href='./index.php'>
					<button type="submit" class="btn btn-warning btn-block" style=" font-size: 25px;">
						<span style="color: white">Finalizar Compra</span></a>
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