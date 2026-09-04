<?php

class ComprasService{
  public function create($compras) {
    $status = $compras->getStatus();
    $dataDaCompra = $compras->getDataDaCompra();

    try {
      $conexao = Conexao::conectar();
      $sql = "INSERT INTO pedidos (status, dataDaCompra)
              VALUES (:status, :dataDaCompra)";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":status", $status);
      $stmt -> bindParam(":dataDaCompra", $dataDaCompra);

      $stmt -> execute();

      $idPedido = $conexao -> lastInsertIdPedido();
      $compras->setIdPedido($idPedido);

      return $compras;
    } catch (PDOException $e) {
      return null;
    }
  }

  public function update($compras) {
    $idPedido = $compras->getIdPedido();
    $status = $compras->getStatus();
    $dataDaCompra = $compras->getDataDaCompra();

    try {
      $conexao = Conexao::conectar();
      $sql = "UPDATE pedidos SET status=:status, dataDaCompra=:dataDaCompra WHERE idPedido = :idPedido";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idPedido", $idPedido);
      $stmt -> bindParam(":status", $status);
      $stmt -> bindParam(":dataDaCompra", $dataDaCompra);

      $stmt -> execute();

      return $compras;
    } catch (PDOException $e) {
      return null;
    }
  }

  public static function getComprass() {
    try {
      $conexao = Conexao::conectar();
      $sql = $conexao->prepare("SELECT * FROM supermercadoweb.pedidos");

      $sql -> execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);

      $comprass = array();
      $i = 0;

      while ($data = $sql -> fetch(PDO::FETCH_ASSOC)) {
        $currentCompras = new ComprasModel($data['status'],  $data['dataDaCompra']);
        $currentCompras->setIdPedido($data['idPedido']);

        $comprass[$i] = $currentCompras;
        $i++;
      }
      
      return $comprass;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function getCompras($compras) {
    $idPedido = $compras->getIdPedido();

    try {
      $conexao = Conexao::conectar();
      $sql = "SELECT * FROM supermercadoweb.pedidos WHERE idPedido = :idPedido";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idPedido", $idPedido);

      $stmt -> execute();
    
      $data = $stmt -> fetch();

      $compras = new ComprasModel($data["status"], $data["dataDaCompra"]);
      $compras->setIdPedido($data["idPedido"]);

      return $compras;
    } catch (PDOException $e) {
      return null;
    }
  }

  public static function atualizarStatus($idPedido, $status) {
    $conexao = Conexao::conectar();
    $sql = "UPDATE pedidos SET status = :status WHERE idPedido = :idPedido";
    $stmt = $conexao -> prepare($sql);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":idPedido", $idPedido);
    $stmt->execute();
  }

  public static function Item($idPedido) {
    $conexao = Conexao::conectar();
    $sql = "SELECT * FROM pedidos WHERE idPedido = :idPedido";
    $stmt = $conexao -> prepare($sql);
    $stmt->bindParam(":idPedido", $idPedido);
    $stmt->execute();
  }

  
  public static function getComprasByStatus($status) {
    try {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM supermercadoweb.pedidos WHERE status = :status";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
  
        $compras = array();
  
        while ($data = $stmt->fetch()) {
            $currentCompra = new ComprasModel($data["status"], $data["dataDaCompra"]);
            $currentCompra->setIdPedido($data["idPedido"]);
  
            $compras[] = $currentCompra;
        }  
        return $compras;
      }catch (PDOException $e) {
        return null;
    }
  }





}