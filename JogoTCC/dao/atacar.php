<?php
include 'conexao.php';
session_start();
$idPersonagem = $_SESSION['id'];
if (isset($_POST['defesa'])) {
    // Process the attack
    $nomeDefesa = $_POST['defesa'];


$selectAtaque = 'SELECT * FROM personagem WHERE id =' . $idPersonagem;
$selectDefesa = 'SELECT * FROM personagem WHERE nome="' . $nomeDefesa . '"';

$QRatk = $conn->query($selectAtaque);
$QRdef = $conn->query($selectDefesa);

$atk = mysqli_fetch_assoc($QRatk);
$def = mysqli_fetch_assoc($QRdef);

$res = 0;

if ($atk['stat1'] > $def['stat1']) {
    $res = $res + 1;
} elseif ($atk['stat1'] < $def['stat1']) {
    $res = $res - 1;
}
if ($atk['stat2'] > $def['stat2']) {
    $res = $res + 1;
} elseif ($atk['stat2'] < $def['stat2']) {
    $res = $res - 1;
}
if ($atk['stat3'] > $def['stat3']) {
    $res = $res + 1;
} elseif ($atk['stat3'] < $def['stat3']) {
    $res = $res - 1;
}
if ($atk['stat4'] > $def['stat4']) {
    $res = $res + 1;
} elseif ($atk['stat4'] < $def['stat4']) {
    $res = $res - 1;
}

if ($res > 0) {
    $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','" . $atk['nome'] . "')";
    $somavitoria = $atk['vitorias'] + 1;
    $somaouro = $atk['ouro']+($def['ouro']/10);
    $sqlatualizabatalha = "UPDATE personagem SET vitorias=" . $somavitoria . ", ouro = ". $somaouro . " WHERE id=" . $atk['id'];
    $executa2 = $conn->query($sqlatualizabatalha);
} elseif ($res < 0) {
    $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','" . $def['nome'] . "')";
    $somavitoria = $def['vitorias'] + 1;
    $somaouro = $def['ouro']+($atk['ouro']/10);
    $sqlatualizabatalha = "UPDATE personagem SET vitorias=" . $somavitoria . ", ouro = ". $somaouro . " WHERE id=" . $def['id'];
    $executa2 = $conn->query($sqlatualizabatalha);
} else {
    $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','empate')";

}
$executa1 = $conn->query($SQLresultado);
    header("location: ../inicial.php");
}

?>
