<?php
$servername = "localhost"; // ou o IP do seu servidor MySQL
$username = "root";
$password = "Bielg32413912";
$dbname = "angels_mc";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
