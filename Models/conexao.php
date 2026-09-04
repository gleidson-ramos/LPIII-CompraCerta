<?php

class Conexao{
	public static function conectar(){
		$host = 'localhost:3306';
		$dbname = 'supermercadoweb';
		$user = 'root';
		$pass = '';

		try{
			$conexao = new PDO("mysql:host=$host;dbname=$dbname", "$user","$pass");
			$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conexao;
		} catch(PDOException $e){
			echo 'Mensagem de erro: '.$e->getMessage();
		}
	}

}
?>