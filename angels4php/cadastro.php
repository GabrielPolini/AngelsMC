<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="registration-container">
        <h1 class="glitch">Cadastro</h1>
        <form class="registration-form" action="inicio.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Idade:</label>
            <input type="number" id="age" name="age" required>

            <label for="role">Função:</label>
            <select id="role" name="role" required>
                <option value="">Selecione uma função</option>
                <option value="Funcionario">Funcionário</option>
                <option value="Prospect">Prospect</option>
                <option value="Membro">Membro</option>
                <option value="Secretary">Secretary</option>
                <option value="Sergeant at Arms">Sergeant at Arms</option>
                <option value="Road Captain">Road Captain</option>
                <option value="Treasurer">Treasurer</option>
                <option value="Enforcer">Enforcer</option>
                <option value="Lieutenant">Lieutenant</option>
                <option value="Vice President">Vice President</option>
                <option value="President">President</option>
            </select>

            <button type="submit" class="hack-button">Cadastrar</button>
        </form>
        <div class="login-link">
            <p>Já tem uma conta?</p>
            <a href="login.php" class="hack-button">Login</a>
        </div>
    </div>
</body>
</html>
