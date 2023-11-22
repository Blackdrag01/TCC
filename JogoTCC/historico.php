<?php
session_start();
include 'dao/conexao.php'; 
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>RPG de Browser</title>
</head>
<body>
    <?php
    $personagem = $conn->query("SELECT * FROM personagem WHERE id = " . $_SESSION['id']);
    $exibePersonagem = $personagem->fetch_assoc();
    $batalhas = $conn->query("SELECT * FROM batalha WHERE `player1` LIKE '" . $exibePersonagem['nome'] . "' OR `player2` LIKE '" . $exibePersonagem['nome'] . "' ORDER BY id DESC;");
    ?>

    <div class="container">
        <h1>Histórico</h1>
        <div class="game-container">
            <div class="row">
                <table>
                    <tr>
                        <th>  Atacante  </th>
                        <th>  Defensor  </th>
                        <th>  Vencedor  </th>
                    </tr>
                    <?php while ($rows_batalha = mysqli_fetch_assoc($batalhas)) { ?>
                        <tr>
                            <td>  <?php echo $rows_batalha['player1'] ?> |</td>
                            <td>  <?php echo $rows_batalha['player2'] ?> |</td>
                            <td>  <?php echo $rows_batalha['vencedor'] ?>  </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
