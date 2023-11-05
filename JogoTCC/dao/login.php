<?php
include('conexao.php');

$nome = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $conn->prepare("SELECT id FROM personagem WHERE nome = ? AND senha = ?");
$stmt->bind_param("ss", $nome, $senha);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    session_start();
    $_SESSION['login'] = $nome;
    $stmt->bind_result($id);
    $stmt->fetch();
    $_SESSION['id'] = $id;
    header("location: ../inicial.php");
} else {
    echo "Login ou senha não conferem";
    echo "<br><a href = '../index.php'><button>Voltar</button></a>";
}

$stmt->close();
$conn->close();


?>