<?php
session_start();

$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];

$ID = isset($_POST['ID']) ? $_POST['ID'] : '';

$sql = "INSERT INTO `antrenori` (ID, email) 
        VALUES (?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $ID, $email);

if ($stmt->execute()) {
    header("Location: OrarAntrenori.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $stmt->close();
}

$conn->close();
?>