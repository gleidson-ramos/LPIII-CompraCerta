<?php
require_once "../Models/conexao.php";
require_once "../Models/Compras_Model.php";
require_once "../Models/Compras_Service.php";
require_once "../Controllers/ComprasController.php";
$compras = ComprasController::listarCompras();
include("Head.php");
?>

<style>
  .nav-link1{
    color: white;
  }

  .nav-link1:hover{
    color: orange;
  }

  .nav-link{
    color: black;
  }

  .nav-link:hover{
    color: orange;
  }
</style>

<div class="container">
  <div class="container mt-3">
    <h2>Central de Compras</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#home">Todas as Compras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Compras Abertas</a>
      </li>      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Em Preparação</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu3">Aguardando Entrega</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu4">Compras em Rota de Entrega</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu5">Compra Entregue</a>
      </li>
    </ul>
  
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>Todas as Compras</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Status</th>
            </tr>
          </thead>

          <?php foreach ($compras as $compra) {?>          
          <tbody>
            <tr>
              <td>João Silva</td>
              <td><?= $compra->getDataDaCompra() ?></td>
              <td>Avenida Brasil</td>
              <td>Lista</td>
              <td><?= $compra->getStatus() ?></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>
      </div>


      <div id="menu1" class="container tab-pane fade"><br>
        <h3>Visualizar Compras Abertas</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>              
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Alterar Status</th>
            </tr>
          </thead>        
          <tbody>
            <?php
            $compras = ComprasController::listarComprasByStatus("Aguardando Atendimento");
            foreach ($compras as $compra) {?>
              <tr>
                <td>Nome</td>
                <td><?= $compra->getDataDaCompra() ?></td>
                <td>Endereço</td>
                <td>Produtos</td>
                <td><form method="POST" action="change_status.php">
                  <input type="hidden" name="idPedido" value="<?= $compra->getIdPedido() ?>">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                      <option value="Aguardando Atendimento" <?= ($compra->getStatus() == 'Aguardando Atendimento') ? 'selected' : '' ?>>Aguardando Atendimento</option>
                      <option value="Em Preparação" <?= ($compra->getStatus() == 'Em Preparação') ? 'selected' : '' ?>>Em Preparação</option>
                      <option value="Aguardando Entrega" <?= ($compra->getStatus() == 'Aguardando Entrega') ? 'selected' : '' ?>>Aguardando Entrega</option>
                      <option value="Compra em Rota de Entrega" <?= ($compra->getStatus() == 'Compra em Rota de Entrega') ? 'selected' : '' ?>>Compra em Rota de Entrega</option>
                      <option value="Compra Entregue" <?= ($compra->getStatus() == 'Compra Entregue') ? 'selected' : '' ?>>Compra Entregue</option>
                    </select>
                  </form>
                </td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
       </div>

      
      <div id="menu2" class="container tab-pane fade"><br>
        <h3>Compras em Preparação</h3>
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>             
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Alterar Status</th>
            </tr>
          </thead>        
          <tbody>
            <?php
            $compras = ComprasController::listarComprasByStatus("Em Preparação");
            foreach ($compras as $compra) {?>
              <tr>
                <td>Nome</td>                
                <td><?= $compra->getDataDaCompra() ?></td>
                <td>Endereço</td>
                <td>Produtos</td>
                <td><form method="POST" action="change_status.php">
                  <input type="hidden" name="idPedido" value="<?= $compra->getIdPedido() ?>">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                      <option value="Aguardando Atendimento" <?= ($compra->getStatus() == 'Aguardando Atendimento') ? 'selected' : '' ?>>Aguardando Atendimento</option>
                      <option value="Em Preparação" <?= ($compra->getStatus() == 'Em Preparação') ? 'selected' : '' ?>>Em Preparação</option>
                      <option value="Aguardando Entrega" <?= ($compra->getStatus() == 'Aguardando Entrega') ? 'selected' : '' ?>>Aguardando Entrega</option>
                      <option value="Compra em Rota de Entrega" <?= ($compra->getStatus() == 'Compra em Rota de Entrega') ? 'selected' : '' ?>>Compra em Rota de Entrega</option>
                      <option value="Compra Entregue" <?= ($compra->getStatus() == 'Compra Entregue') ? 'selected' : '' ?>>Compra Entregue</option>
                    </select>
                  </form>
                </td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
       </div>





      <div id="menu3" class="container tab-pane fade"><br>
        <h3>Compras Aguardando Entrega</h3>
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Alterar Status</th>
            </tr>
          </thead>        
          <tbody>
            <?php
            $compras = ComprasController::listarComprasByStatus("Aguardando Entrega");
            foreach ($compras as $compra) {?>
              <tr>
                <td>Nome</td>
                
                <td><?= $compra->getDataDaCompra() ?></td>
                <td>Endereço</td>
                <td>Produtos</td>
                <td><form method="POST" action="change_status.php">
                  <input type="hidden" name="idPedido" value="<?= $compra->getIdPedido() ?>">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                      <option value="Aguardando Atendimento" <?= ($compra->getStatus() == 'Aguardando Atendimento') ? 'selected' : '' ?>>Aguardando Atendimento</option>
                      <option value="Em Preparação" <?= ($compra->getStatus() == 'Em Preparação') ? 'selected' : '' ?>>Em Preparação</option>
                      <option value="Aguardando Entrega" <?= ($compra->getStatus() == 'Aguardando Entrega') ? 'selected' : '' ?>>Aguardando Entrega</option>
                      <option value="Compra em Rota de Entrega" <?= ($compra->getStatus() == 'Compra em Rota de Entrega') ? 'selected' : '' ?>>Compra em Rota de Entrega</option>
                      <option value="Compra Entregue" <?= ($compra->getStatus() == 'Compra Entregue') ? 'selected' : '' ?>>Compra Entregue</option>
                    </select>
                  </form>
                </td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
       </div>


      <div id="menu4" class="container tab-pane fade"><br>
        <h3>Compras em Rota de Entrega</h3>
        
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Alterar Status</th>
            </tr>
          </thead>        
          <tbody>
            <?php
            $compras = ComprasController::listarComprasByStatus("Compra em Rota de Entrega");
            foreach ($compras as $compra) {?>
              <tr>
                <td>Nome</td>
                
                <td><?= $compra->getDataDaCompra() ?></td>
                <td>Endereço</td>
                <td>Produtos</td>
                <td><form method="POST" action="change_status.php">
                  <input type="hidden" name="idPedido" value="<?= $compra->getIdPedido() ?>">
                    <select name="status" class="form-select" onchange="this.form.submit()">
                      <option value="Aguardando Atendimento" <?= ($compra->getStatus() == 'Aguardando Atendimento') ? 'selected' : '' ?>>Aguardando Atendimento</option>
                      <option value="Em Preparação" <?= ($compra->getStatus() == 'Em Preparação') ? 'selected' : '' ?>>Em Preparação</option>
                      <option value="Aguardando Entrega" <?= ($compra->getStatus() == 'Aguardando Entrega') ? 'selected' : '' ?>>Aguardando Entrega</option>
                      <option value="Compra em Rota de Entrega" <?= ($compra->getStatus() == 'Compra em Rota de Entrega') ? 'selected' : '' ?>>Compra em Rota de Entrega</option>
                      <option value="Compra Entregue" <?= ($compra->getStatus() == 'Compra Entregue') ? 'selected' : '' ?>>Compra Entregue</option>
                    </select>
                  </form>
                </td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
       </div>


      <div id="menu5" class="container tab-pane fade"><br>
        <h3>Compra Entregue</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nome Completo</th>
              <th>Data / Hora</th>
              <th>Endereço da Entrega</th>
              <th>Lista de Produtos</th>
              <th>Status</th>
            </tr>
          </thead>        
          <tbody>
            <?php
              $compras = ComprasController::listarComprasByStatus("Compra Entregue");
              foreach ($compras as $compra) {?>
              <tr>
                <td>Nome</td>
                <td><?= $compra->getDataDaCompra() ?></td>
                <td>Endereço</td>
                <td>Produtos</td>
                <td><?= $compra->getStatus();?></td>
              </tr>
              <?php } ?>
              </tbody>
          </table>
    </div>


  </div>
</div>

<?php include("Footer.php"); ?>
</body>
</html>
