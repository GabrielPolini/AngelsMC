<?php
include 'db_config.php'; // Inclui o arquivo de configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weapon_id = $_POST['weapon-id'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO inventory (weapon_id, quantity) VALUES ('$weapon_id', '$quantity') 
            ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "Estoque atualizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
