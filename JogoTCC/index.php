<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPG de Browser</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .game-container {
            margin-top: 20px;
        }

        .row {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
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
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <a href="registrar.php"><button>Registrar</button></a>
        </div>
    </div>
</body>

</html>
