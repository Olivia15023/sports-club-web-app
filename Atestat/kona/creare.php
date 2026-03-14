<?php
$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

// Crează conexiunea la baza de date
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Creează tabelul pentru utilizatori
$sql = "CREATE TABLE  utilizatori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    parola VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabelul 'utilizatori' a fost creat cu succes.";
} else {
    echo "Eroare la crearea tabelului: " . $conn->error;
}

// Închide conexiunea la baza de date
$conn->close();
?>