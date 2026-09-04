<?php
require_once "../Controllers/LoginSignInController.php";
include("Head.php");

if (!isset($_SESSION['user'])) {
    header('Location: acessoUsuario.php');
    exit;
}

$userId = $_SESSION['user'];

$host = 'localhost:3306';
$dbname = 'supermercadoweb';
$username = 'root';
$password = '';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_user'])) {
    $editUserId = $_POST['user_id'];
    $newName = $_POST['nomeUsuario'];
    $newCpf = $_POST['cpfUsuario'];
    $newEmail = $_POST['emailUsuario'];
    $newTelephone = $_POST['telefoneUsuario'];
    $newAddress = $_POST['enderecoUsuario'];

    if ($editUserId == $userId) {
        $updateQuery = "UPDATE usuarios SET nomeUsuario = :nomeUsuario, cpfUsuario = :cpfUsuario, emailUsuario = :emailUsuario, telefoneUsuario = :telefoneUsuario, enderecoUsuario = :enderecoUsuario WHERE idUsuario = :idUsuario";
        $updateStmt = $connection->prepare($updateQuery);
        $updateStmt->bindValue(':nomeUsuario', $newName);
        $updateStmt->bindValue(':cpfUsuario', $newCpf);
        $updateStmt->bindValue(':emailUsuario', $newEmail);
        $updateStmt->bindValue(':telefoneUsuario', $newTelephone);
        $updateStmt->bindValue(':enderecoUsuario', $newAddress);
        $updateStmt->bindValue(':idUsuario', $editUserId);
        $updateStmt->execute();

        header('Location: ../Views/perfil.php');
    } else {
        header('Location: ../Views/perfil.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $deleteUserId = $_POST['user_id'];

    if ($deleteUserId == $userId) {
        header('Location: index.php');
        exit;
    }

    $deleteQuery = "DELETE FROM usuarios WHERE idUsuario = :idUsuario";
    $deleteStmt = $connection->prepare($deleteQuery);
    $deleteStmt->bindValue(':idUsuario', $deleteUserId);
    $deleteStmt->execute();

    header('Location: index.php');
    exit;
}




$query = "SELECT * FROM usuarios";
$stmt = $connection->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
