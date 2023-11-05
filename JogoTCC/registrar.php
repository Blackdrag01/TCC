<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>RPG de Browser</title>
</head>
<body>
    <div class="container">
        <h1>RPG de Browser</h1>
        <div class="game-container">
            <form action="dao/registro.php" method="POST">
                <div class="row">
                    <label for="">Nome do Personagem</label><br>
                    <input type="text" id="login" name="login" required><br>
                    <label for="">Senha</label><br>
                    <input type="password" name="senha" id="senha" required><br>
                    <label for="">Confirme a Senha</label><br>
                    <input type="password" name="confirma_senha" id="confirma_senha" required><br>
                    <div class="col">
                        <br><button type="submit">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
