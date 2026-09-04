<?php
require_once '../Models/Usuario.php';
require_once "../Models/conexao.php";

class UsuarioController {
    public function cadastrar($dados) {
        $usuario = new Usuario();

        $usuario->setNomeUsuario($dados['nomeUsuario']);
        $usuario->setCpfUsuario($dados['cpfUsuario']);
        $usuario->setEmailUsuario($dados['emailUsuario']);
        $usuario->setTelefoneUsuario($dados['telefoneUsuario']);
        $usuario->setEnderecoUsuario($dados['enderecoUsuario']);
        $usuario->setSenhaUsuario($dados['senhaUsuario']);

        $host = 'localhost:3306';
        $dbname = 'supermercadoweb';
        $username = 'root';
        $password = '';

        $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        $query = "
        INSERT INTO
        usuarios (nomeUsuario, cpfUsuario, emailUsuario, telefoneUsuario, enderecoUsuario, senhaUsuario) 
        VALUES
        (:nomeUsuario, :cpfUsuario, :emailUsuario, :telefoneUsuario, :enderecoUsuario, :senhaUsuario)";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nomeUsuario', $usuario->getNomeUsuario());
        $stmt->bindValue(':cpfUsuario', $usuario->getCpfUsuario());
        $stmt->bindValue(':emailUsuario', $usuario->getEmailUsuario());
        $stmt->bindValue(':telefoneUsuario', $usuario->getTelefoneUsuario());
        $stmt->bindValue(':enderecoUsuario', $usuario->getEnderecoUsuario());
        $stmt->bindValue(':senhaUsuario', $usuario->getSenhaUsuario());
        $stmt->execute();

    }
}
?>
