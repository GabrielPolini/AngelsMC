<?php
include 'db_config.php'; // Inclui o arquivo de configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['weapon-name'];
    $price = $_POST['weapon-price'];

    $sql = "INSERT INTO weapons (name, price) VALUES ('$name', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Arma adicionada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
