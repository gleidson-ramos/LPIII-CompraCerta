<?php

class ClienteService{
	public function create(){
		$query = 'insert into Usuarios
		(nomeUsuario, emailUsuario, senhaUsuario, cpfUsuario, telefoneUsuario, enderecoUsuario)
		values
		(:nomeUsuario, :emailUsuario, :senhaUsuario, :cpfUsuario :telefoneUsuario, :enderecoUsuario)';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nomeUsuario',$this->cadastro->__get('nomeUsuario'));
		$stmt->bindValue(':emailUsuario',$this->cadastro->__get('emailUsuario'));
		$stmt->bindValue(':senhaUsuario',$this->cadastro->__get('senhaUsuario'));
		$stmt->bindValue(':cpfUsuario',$this->cadastro->__get('cpfUsuario'));
		$stmt->bindValue(':telefoneUsuario',$this->cadastro->__get('telefoneUsuario'));
		$stmt->bindValue(':enderecoUsuario',$this->cadastro->__get('enderecoUsuario'));
		$stmt->execute();
	}

	public function read(){
		$query = 'select 
		nomeUsuario, emailUsuario, senhaUsuario, cpfUsuario, telefoneUsuario, enderecoUsuario
		from 
		Usuarios';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function update(){
		
		$query = "update usuarios SET
		nomeUsuario = :nomeUsuario, emailUsuario = :emailUsuario, senhaUsuario = :senhaUsuario, cpfUsuario = :cpfUsuario, telefoneUsuario = :telefoneUsuario, enderecoUsuario = :enderecoUsuario
        WHERE idUsuario = :idUsuario";
		$stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nomeUsuario',$this->cadastro->__get('nomeUsuario'));
        $stmt->bindValue(':emailUsuario',$this->cadastro->__get('emailUsuario'));
        $stmt->bindValue(':senhaUsuario',$this->cadastro->__get('senhaUsuario'));
        $stmt->bindValue(':cpfUsuario',$this->cadastro->__get('cpfUsuario'));
        $stmt->bindValue(':telefoneUsuario',$this->cadastro->__get('telefoneUsuario'));
        $stmt->bindValue(':enderecoUsuario',$this->cadastro->__get('enderecoUsuario'));
		$stmt->bindValue(':idUsuario',$this->cadastro->__get('idUsuario'));
		return $stmt->execute();
	}


	public function delete(){
		$query = 'delete from usuarios WHERE idUsuario = :idUsuario';
		$stmt= $this->conexao->prepare($query);
		$stmt->bindValue(':idUsuario',$this->cadastro->__get('idUsuario'));
		$stmt->execute();
	}

	public function getClientes() {
		try {
		  $conexao =Conexao::conectar();
		  $sql = "SELECT * FROM usuarios";
		  $stmt = $conexao -> prepare($sql);
	
		  $stmt -> execute();
		  
		  $clientes = array();
	
		  while ($data = $stmt->fetch()) {
			$cliente = new ClienteModel($data['idUsuario'], $data['nomeUsuario'], $data['cpfUsuario'], $data['emailUsuario'], $data['senhaUsuario'], $data['telefoneUsuario'], $data['enderecoUsuario']);
			$cliente->setIdUsuario($data["idUsuario"]);
			$cliente->setNomeUsuario($data["nomeUsuario"]);
			$cliente->setCpfUsuario($data["cpfUsuario"]);
	
			array_push($clientes, $cliente);
		  }
	
		  return $clientes;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	  }

	  public static function checkEmail($email)
	  {
		try {
            $conexao = Conexao::conectar();

            $sql = $conexao->prepare("SELECT u.idUsuario, u.senhaUsuario from supermercadoweb.usuarios as u where u.emailUsuario = :emailUsuario ");
            $sql->bindParam(":emailUsuario", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $query =  $sql->fetch(PDO::FETCH_ASSOC);



            if ($query == false) {
                return 'falso';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function checkSenha($email)
	  {
		try {
            $conexao = Conexao::conectar();

            $sql = $conexao->prepare("SELECT u.senhaUsuario from supermercadoweb.usuarios as u where u.emailUsuario = :emailUsuario ");
            $sql->bindParam(":emailUsuario", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $query =  $sql->fetch(PDO::FETCH_ASSOC);

            if ($query['senhaUsuario'] !== $_POST['senhaUsuario']) {
                return false;
            } else return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getClienteById($userId)
	  {
		try {
			$conexao = Conexao::conectar();
			$sql = $conexao->prepare("SELECT * from supermercadoweb.usuarios as u where u.idUsuario = :idUsuario");
			$sql->bindParam("idUsuario", $idUsuario);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			$data = $sql->fetch(PDO::FETCH_ASSOC);
			$usuario = new ClienteModel($data['idUsuario'], $data['nomeUsuario'], $data['cpfUsuario'], $data['emailUsuario'], $data['senhaUsuario'], $data['dataUsuario'], $data['dddUsuario'], $data['telefoneUsuario'], $data["sexoUsuario"], $data['ruaUsuario'], $data['numeroRuaUsuario'], $data['cidadeUsuario'], $data['estadoUsuario'], $data['cepUsuario'], $data['bairroUsuario'], $data['complementoUsuario']);

			$idUsuario = $usuario->getIdUsuario();
			$user = new ClienteModel(
				$usuario->getNomeUsuario(),
				$usuario->getEmailUsuario(),
				$usuario->getSenhaUsuario(),
				$usuario->getCpfUsuario(),
				$usuario->getTelefoneUsuario(),
				$usuario->getEnderecoUsuario(),
				$idUsuario,
			);

			return $user;
		} catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getCliente($email)
	  {
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercadoweb.usuarios as u where u.emailUsuario = :emailUsuario");
            $sql->bindParam(":emailUsuario", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUsuario'], $data['nomeUsuario'], $data['cpfUsuario'], $data['emailUsuario'], $data['senhaUsuario'], $data['telefoneUsuario'], $data['enderecoUsuario']);

			$idUsuario = $usuario->getIdUsuario();
			$user = new ClienteModel(
				$usuario->getNomeUsuario(),
				$usuario->getEmailUsuario(),
				$usuario->getSenhaUsuario(),
				$usuario->getCpfUsuario(),
				$usuario->getTelefoneUsuario(),
				$usuario->getEnderecoUsuario(),
				$idUsuario,
			);

            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getNomeCliente($email)
	  {
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercadoweb.usuarios as u where u.emailUsuario = :emailUsuario");
            $sql->bindParam(":emailUsuario", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUsuario'], $data['nomeUsuario'], $data['cpfUsuario'], $data['emailUsuario'], $data['senhaUsuario'], $data['telefoneUsuario'], $data['enderecoUsuario']);

			$nome = $usuario->getNomeUsuario();
			$_SESSION['nomeCliente'] = $nome;
            return $_SESSION['nomeCliente'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }

	  public static function getIdCliente($email){
		try {
            $conexao = Conexao::conectar();
            $sql = $conexao->prepare("SELECT * from supermercadoweb.usuarios as u where u.emailUsuario = :emailUsuario");
            $sql->bindParam(":emailUsuario", $email);
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new ClienteModel($data['idUsuario'], $data['nomeUsuario'], $data['cpfUsuario'], $data['emailUsuario'], $data['senhaUsuario'], $data['telefoneUsuario'], $data['enderecoUsuario']);

			$id = $usuario->getIdUsuario();
			$_SESSION['idCliente'] = $id;
            return $_SESSION['idCliente'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
	  }
}


?>