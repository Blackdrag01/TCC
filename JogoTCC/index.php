<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG de Browser</title>
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    <div class="container">
        <h1>RPG de Browser</h1>
        <div class="game-container">
            <div class="row">
                <form action="dao/login.php" method="POST">
                    <label for="login">Nome de Usuário</label>
                    <input type="text" id="login" name="login" required>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required>
                    <div class="col">
                        <button type="submit" align = "center">Login</button>
                    </div>
                </form>
            </div>
            <a href="registrar.php"><button>Registrar</button></a>
        </div>
    </div>
</body>

</html>
