<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página de login ou outra página desejada
header("Location: ../index.php");
exit();
?>
