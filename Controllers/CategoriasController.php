<?php
require_once "../Models/conexao.php";

class CategoriasController{
  public static function listarCategorias() {
    $categoriaService = new CategoriaService();

    $categorias = $categoriaService -> getCategorias();
    return $categorias;
  }  
}

?>