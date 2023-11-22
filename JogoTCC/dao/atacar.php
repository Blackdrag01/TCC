<?php
include 'conexao.php';
session_start();

function sanitizeInput($conn,$input)
{
    return mysqli_real_escape_string($conn,$input);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ataque'])) {
    $idPersonagem = $_SESSION['id'];

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'submit_') === 0) {
            $idDefesa = substr($key, strlen('submit_'));
            $nomeDefesa = sanitizeInput($conn,$_POST['defesa_' . $idDefesa]);
        }
    }

    // Debugging: Dump variables
    var_dump($idPersonagem, $idDefesa, $nomeDefesa);

    // Database queries and battle logic
    $selectAtaque = "SELECT * FROM personagem WHERE id = $idPersonagem";
    $selectDefesa = "SELECT * FROM personagem WHERE nome = '$nomeDefesa'";

    $QRatk = $conn->query($selectAtaque);
    $QRdef = $conn->query($selectDefesa);

    $atk = mysqli_fetch_assoc($QRatk);
    $def = mysqli_fetch_assoc($QRdef);

    $res = 0;

    // Battle logic
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
echo "logica de batalha";
    // Insert battle result into the database
    if ($res > 0) {
        $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','" . $atk['nome'] . "')";
        $somavitoria = $atk['vitorias'] + 1;
        $somaouro = $atk['ouro'] + ($def['ouro'] / 10);
        $sqlatualizabatalha = "UPDATE personagem SET vitorias=" . $somavitoria . ", ouro = " . $somaouro . " WHERE id=" . $atk['id'];
        $executa2 = $conn->query($sqlatualizabatalha);
        echo "vitoria";
        // Handle errors if needed
        if (!$executa2) {
            // Handle the error, e.g., log it, display an error message, etc.
            echo "Error updating attacker's data: " . mysqli_error($conn);
            exit;
        }
    } elseif ($res < 0) {
        $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','" . $def['nome'] . "')";
        $somavitoria = $def['vitorias'] + 1;
        $somaouro = $def['ouro'] + ($atk['ouro'] / 10);
        $sqlatualizabatalha = "UPDATE personagem SET vitorias=" . $somavitoria . ", ouro = " . $somaouro . " WHERE id=" . $def['id'];
        $executa2 = $conn->query($sqlatualizabatalha);
        echo "derrota";
        // Handle errors if needed
        if (!$executa2) {
            // Handle the error, e.g., log it, display an error message, etc.
            echo "Error updating defender's data: " . mysqli_error($conn);
            exit;
        }
    } else {
        $SQLresultado = "INSERT INTO `batalha`(`player1`, `player2`, `vencedor`) VALUES ('" . $atk['nome'] . "','" . $def['nome'] . "','empate')";
    }
    echo "resultado";
    $executa1 = $conn->query($SQLresultado);

    // Handle errors if needed
    if (!$executa1) {
        // Handle the error, e.g., log it, display an error message, etc.
        echo "Error inserting battle result: " . mysqli_error($conn);
        exit;
    }

    header("location: ../inicial.php");
}
?>
