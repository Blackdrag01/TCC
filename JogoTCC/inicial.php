<!DOCTYPE html>
<?php include 'dao/conexao.php'; 
    include_once 'header.php';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>RPG de Browser</title>
</head>
<body>
    <?php

    session_start(); 
    $personagem = $conn->query("SELECT * FROM personagem WHERE id = " . $_SESSION['id']);
    $exibePersonagem = $personagem->fetch_assoc(); ?>
    <div class="container">
        <h1>Personagem <?php echo $exibePersonagem['nome']; ?></h1>
        <div class="game-container">
                <div class="row">
                    <form action="dao/treinar.php" method="POST">
                        <label>Força: <?php echo $exibePersonagem['stat1'] ?></label>
                        <input type="submit" name="forca" value="Treinar Custo: <?php echo ($exibePersonagem['stat1']*$exibePersonagem['stat1']); ?>" /><br>
                        <label>Agilidade: <?php echo $exibePersonagem['stat2'] ?></label>
                        <input type="submit" name="agilidade" value="Treinar Custo: <?php echo ($exibePersonagem['stat2']*$exibePersonagem['stat2']); ?>" /><br>
                        <label>Destreza: <?php echo $exibePersonagem['stat2'] ?></label>
                        <input type="submit" name="destreza" value="Treinar Custo: <?php echo ($exibePersonagem['stat3']*$exibePersonagem['stat3']); ?>" /><br>
                        <label>Resistencia: <?php echo $exibePersonagem['stat2'] ?></label>
                        <input type="submit" name="resistencia" value="Treinar Custo: <?php echo ($exibePersonagem['stat4']*$exibePersonagem['stat4']); ?>" /><br>
                    </form>
                </div>
            </div>
        </div>

        
    </div>
</body>
</html>
