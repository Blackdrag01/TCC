<?php
include('conexao.php');

$nome = $_POST['login'];
$senha = $_POST['senha'];
$confirmaSenha = $_POST['confirma_senha'];

$result = $conn->query("SELECT * FROM personagem WHERE nome LIKE '$nome'");
if($senha != $confirmaSenha){
    echo "As senhas digitadas não são iguais";
    echo "<br><a href = '../registrar.php'><button>Voltar</button></a>";
}else{
if ($result->num_rows > 0) {
    echo "Nome de Usuario já utilizado";
    header("location: ../registrar.php");
} else {
    $result = $conn->query("INSERT INTO `personagem` (`id`, `nome`, `senha`, `ouro`, `stat1`, `stat2`, `stat3`, `stat4`) VALUES (NULL, '$nome', '$senha', '100', '5', '5', '5', '5')");

    if ($result === TRUE) {
        echo "Registrado com sucesso";
        header("location: ../index.php");
    }else
    echo "Erro desconhecido";
}
}
?>