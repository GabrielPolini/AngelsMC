<?php
include 'db_config.php'; // Inclui o arquivo de configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $role = $_POST['role'];

    $password = 'senha_padrao'; // Defina um password padrão ou gere um hash de senha aqui
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password_hash, role) VALUES ('$name', '$password_hash', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
