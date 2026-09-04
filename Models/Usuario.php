<?php

class Usuario {
    private $idUsuario;
    private $nomeUsuario;
    private $cpfUsuario;
    private $emailUsuario;
    private $telefoneUsuario;
    private $enderecoUsuario;
    private $senhaUsuario;

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

    public function getCpfUsuario() {
        return $this->cpfUsuario;
    }

    public function setCpfUsuario($cpfUsuario) {
        $this->cpfUsuario = $cpfUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
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

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }
}
?>
