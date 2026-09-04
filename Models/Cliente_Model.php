<?php

class ClienteModel{
    private $idUsuario;
    private $nomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $cpfUsuario;
    private $telefoneUsuario;
    private $enderecoUsuario;

    public function __construct($idUsuario, $nomeUsuario, $emailUsuario, $senhaUsuario, $cpfUsuario, $telefoneUsuario, $enderecoUsuario) {
        $this->idUsuario = $idUsuario;
        $this->nomeUsuario = $nomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->senhaUsuario = $senhaUsuario;
        $this->cpfUsuario = $cpfUsuario;
        $this->telefoneUsuario = $telefoneUsuario;
        $this->enderecoUsuario = $enderecoUsuario;
    }

    
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function getCpfUsuario() {
        return $this->cpfUsuario;
    }

    public function setCpfUsuario($cpfUsuario) {
        $this->cpfUsuario = $cpfUsuario;
    }

    public function getTelefoneUsuario() {
        return $this->telefoneUsuario;
    }

    public function setTelefoneUsuario($telefoneUsuario) {
        $this->telefoneUsuario = $telefoneUsuario;
    }

    public function getEnderecoUsuario() {
        return $this->enderecoUsuario;
    }

    public function setEnderecoUsuario($enderecoUsuario) {
        $this->enderecoUsuario = $enderecoUsuario;
    }



}
?>