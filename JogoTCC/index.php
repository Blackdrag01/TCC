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
            
                <div class="row">
                    <form action="dao/login.php" method="POST">
                        <label for="">E-mail</label>
                        <input type="text" id="login" name="login">
                        <label for="">Senha</label>
                        <input type="password" name="senha" id="senha">
                        <div class="col">
                        <button type="submit">Login</button> 
                    </form>
                </div>
            </div>
            

        </div>

                    <a href="registrar.php"><button>Registrar</button></a>
        
    </div>
</body>
</html>
