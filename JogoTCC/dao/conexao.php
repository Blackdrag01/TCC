<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Criando uma conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
