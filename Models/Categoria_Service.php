<?php

class CategoriaService 
{
  public function create($categoria) {
    $nomeCategoria = $categoria->getNomeCategoria();
    $urlImagem = $categoria->getUrlImagem();

    try {
      $conexao = Conexao::conectar();
      $sql = "INSERT INTO categorias(nomeCategoria, imgCategoria) 
              VALUES (:nomeCategoria, :urlImagem)";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":nomeCategoria", $nomeCategoria);
      $stmt -> bindParam(":urlImagem", $urlImagem);

      $stmt -> execute();

      $idCategoria = $conexao -> lastInsertIdCategoria();
      $categoria->setIdCategoria($idCategoria);

      return $categoria;
    } catch (PDOException $e) {
      return null;
    }
  }

  public function delete($categoria) {
    $idCategoria = $categoria->getIdCategoria();

    try {
      $conexao = Conexao::conectar();
      $sql = "DELETE FROM categorias WHERE idCategoria = :idCategoria";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idCategoria", $idCategoria);

      $stmt -> execute();

      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function update($categoria) {
    $idCategoria = $categoria->getIdCategoria();
    $nomeCategoria = $categoria->getNomeCategoria();
    $urlImagem = $categoria->getUrlImagem();

    try {
      $conexao = Conexao::conectar();
      $sql = "UPDATE categorias SET nomeCategoria=:nomeCategoria, imgCategoria=:urlImagem WHERE idCategoria = :idCategoria";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idCategoria", $idCategoria);
      $stmt -> bindParam(":nomeCategoria", $nomeCategoria);
      $stmt -> bindParam(":urlImagem", $urlImagem);

      $stmt -> execute();

      return $categoria;
    } catch (PDOException $e) {
      return null;
    }
  }

  public static function getCategorias() {
    try {
      $conexao = Conexao::conectar();
      $sql = $conexao->prepare("SELECT * FROM supermercado.categoria");

      $sql -> execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);

      $categorias = array();
      $i = 0;

      while ($data = $sql -> fetch(PDO::FETCH_ASSOC)) {
        $currentCategoria = new CategoriaModel($data['nomeCategoria'],  $data['imgCategoria']);
        $currentCategoria->setIdCategoria($data['idCategoria']);

        $categorias[$i] = $currentCategoria;
        $i++;
      }
      
      return $categorias;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function getCategoria($categoria) {
    $idCategoria = $categoria->getIdCategoria();

    try {
      $conexao = Conexao::conectar();
      $sql = "SELECT * FROM categorias WHERE idCategoria = :idCategoria";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idCategoria", $idCategoria);

      $stmt -> execute();
    
      $data = $stmt -> fetch();

      $categoria = new CategoriaModel($data["nomeCategoria"], $data["imgCategoria"]);
      $categoria->setIdCategoria($data["idCategoria"]);

      return $categoria;
    } catch (PDOException $e) {
      return null;
    }
  }
}