<?php
include 'dao/conexao.php';
include_once 'header.php';
session_start();
$idPersonagem = $_SESSION['id'];
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
    <div class="container">
        <h1>Arena</h1>
        <h3>Aqui os personagens lutam por ouro e pela glória de ser o mais forte</h3>
        <div class="game-container">
            <form action='dao/atacar.php' method="POST">
                <table>
                    <tr>
                        <th>Posição</th>
                        <th>Nome</th>
                        <th>Atacar</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM personagem WHERE 1 ORDER BY vitorias DESC";
                    $result_jogadores = $conn->query($sql);
                    $i = 1;
                    while ($rows_jogadores = mysqli_fetch_assoc($result_jogadores)) {
                        if ($rows_jogadores['id'] != $_SESSION['id']) {
                            $idDefesa = $rows_jogadores['id'];
                            $sql_info = "SELECT nome FROM personagem WHERE id = $idDefesa";
                            $result_info = $conn->query($sql_info);
                            $info = mysqli_fetch_assoc($result_info);
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <input type="text" name="defesa_<?php echo $idDefesa; ?>" value="<?php echo $info['nome']; ?>" readonly>
                                </td>
                                <td><input type="submit" name="submit_<?php echo $idDefesa; ?>" value="Atacar"></td>
                            </tr>
                            <?php
                            $i++;
                        } else { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <input type="hidden" name="ataque" value="<?php echo $idPersonagem; ?>">
                                    <input type="text" value="<?php echo $rows_jogadores['nome']; ?>" readonly>
                                </td>
                                <td></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
