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
$sql = "CREATE TABLE  profil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    Competitie VARCHAR(255) NOT NULL,
    Tt VARCHAR(255) NOT NULL,
    Ti VARCHAR(255) NOT NULL,
    Tc VARCHAR(255) NOT NULL,
    Ta VARCHAR(255) NOT NULL

)";

if ($conn->query($sql) === TRUE) {
    echo "Tabelul 'profil' a fost creat cu succes.";
} else {
    echo "Eroare la crearea tabelului: " . $conn->error;
}

// Închide conexiunea la baza de date
$conn->close();
?>