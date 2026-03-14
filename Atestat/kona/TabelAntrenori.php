<?php
//conectare la DB

$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//crearea datei de baze cu programarile

$sql = "CREATE TABLE antrenori (
    ID INT PRIMARY KEY,
    email VARCHAR(50) )";

$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Success!";
} else {
    echo $conn->error;
}

$conn->close();
?>
