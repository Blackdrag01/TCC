<!DOCTYPE html>
<?php include 'dao/conexao.php'; 
    include_once 'header.php';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>RPG de Browser</title>
</head>
<body>
    <?php

    session_start(); 
    $personagem = $conn->query("SELECT * FROM personagem WHERE id = " . $_SESSION['id']);
    $exibePersonagem = $personagem->fetch_assoc(); ?>
    <div class="container">
        <h1>Personagem <?php echo $exibePersonagem['nome']; ?></h1>
        <h2>Ouro: <?php echo $exibePersonagem['ouro']?>     Vitórias:<?php echo $exibePersonagem['vitorias'] ?></h2>
        <div class="game-container">
                <div class="row">
                    <table>
                    <form action="dao/treinar.php" method="POST">
                       <tr><tb> <label>Força: <?php echo $exibePersonagem['stat1'] ?></label></tb>
                        <tb><?php if ($exibePersonagem['ouro']>=($exibePersonagem['stat1']*$exibePersonagem['stat1'])) {?>
                            <input type="submit" name="forca" value="Treinar Custo: <?php echo ($exibePersonagem['stat1']*$exibePersonagem['stat1']); ?>" />
                      <?php  }else{ ?><input type="submit" name="forca" value="Treinar Custo: <?php echo ($exibePersonagem['stat1']*$exibePersonagem['stat1']); ?>" disabled /> <?php }?></tb></tr><br>
                        
                        <tr><tb><label>Agilidade: <?php echo $exibePersonagem['stat2'] ?></label></tb>
                        <?php if ($exibePersonagem['ouro']>=($exibePersonagem['stat2']*$exibePersonagem['stat2'])) {?>
                        <tb><input type="submit" name="agilidade" value="Treinar Custo: <?php echo ($exibePersonagem['stat2']*$exibePersonagem['stat2']); ?>" />
                    <?php }else{ ?><input type="submit" name="agilidade" value="Treinar Custo: <?php echo ($exibePersonagem['stat2']*$exibePersonagem['stat2']); ?>" disabled/><?php } ?></tb></tr><br>


                       <tr><tb> <label>Destreza: <?php echo $exibePersonagem['stat3'] ?></label></tb>
                      <tb>  <?php if ($exibePersonagem['ouro']>=($exibePersonagem['stat3']*$exibePersonagem['stat3'])) {?>
                        <input type="submit" name="destreza" value="Treinar Custo: <?php echo ($exibePersonagem['stat3']*$exibePersonagem['stat3']); ?>" />
                    <?php }else{ ?><input type="submit" name="destreza" value="Treinar Custo: <?php echo ($exibePersonagem['stat3']*$exibePersonagem['stat3']); ?>" disabled /><?php } ?></tb></tr><br>

                        <tr><tb><label>Resistencia: <?php echo $exibePersonagem['stat4'] ?></label></tb>
                        <?php if ($exibePersonagem['ouro']>=($exibePersonagem['stat4']*$exibePersonagem['stat4'])) {?>
                        <tb><input type="submit" name="resistencia" value="Treinar Custo: <?php echo ($exibePersonagem['stat4']*$exibePersonagem['stat4']); ?>" />
                    <?php }else{ ?><input type="submit" name="resistencia" value="Treinar Custo: <?php echo ($exibePersonagem['stat4']*$exibePersonagem['stat4']); ?>" disabled/> <?php } ?></tb></tr><br>
                    </form>
                </table>
                </div>
            </div>
        </div>

        
    </div>
</body>
</html>
