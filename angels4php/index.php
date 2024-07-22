<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #111;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #0f0;
        }

        header .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        .welcome-container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .welcome-container h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        .menu a {
            color: #0f0;
            text-decoration: none;
            font-size: 1.2em;
            border: 1px solid #0f0;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            display: block;
        }

        .menu a:hover {
            background-color: #0f0;
            color: #000;
        }

        .logout-button {
            background-color: #ff0000;
            border: none;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
            margin-top: 20px;
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <header>
        <img src="./Aodmcls.webp" alt="Logo do Clube" class="logo">
        <h1 class="glitch">Bem-vindo</h1>
    </header>
    <div class="welcome-container">
        <h2 id="welcome-message" class="glitch">
            <?php 
                // Pega o parâmetro 'username' da URL
                $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : 'Visitante';
                echo "Olá, $username!";
            ?>
        </h2>
        <nav class="menu">
            <a href="./regras.php">Regras e Leis</a>
            <a href="./membros.php">Membros</a>
            <a href="./armas.php">Armas</a>
            <a href="./estoque.php">Estoque</a>
        </nav>
        <a href="login.php" class="logout-button">Sair</a>
    </div>
</body>
</html>
