<?php

class CategoriaModel{
    private $idCategoria;
    private $nomeCategoria;
    private $imgCategoria;

    public function __construct($nomeCategoria, $imgCategoria){
        $this->nomeCategoria = $nomeCategoria;
        $this->imgCategoria = $imgCategoria;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    public function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getImgCategoria() {
        return $this->imgCategoria;
    }

    public function setImgCategoria($imgCategoria) {
        $this->imgCategoria = $imgCategoria;
    }

    public static function getCategorias() 
    {
        return CategoriaService::getCategorias();
    }
}

?>