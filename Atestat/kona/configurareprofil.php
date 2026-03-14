<?php
session_start();
$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

// CreeazÄƒ conexiunea
$conn = new mysqli($servername, $username, $password, $dbname);

// VerificÄƒ conexiunea
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eÈ™uat: " . $conn->connect_error);
}

    // Extrage CNP-ul (Codul Numeric Personal) al utilizatorului din sesiune
$email = $_SESSION['email'];

$Competitie = isset($_POST['Competitie']) ? $_POST['Competitie'] : '';
$Tt = isset($_POST['Tt']) ? $_POST['Tt'] : '';
$Ti = isset($_POST['Ti']) ? $_POST['Ti'] : '';
$Tc = isset($_POST['Tc']) ? $_POST['Tc'] : '';
$Ta = isset($_POST['Ta']) ? $_POST['Ta'] : '';

$sql = "INSERT INTO `profil` (email, Competitie, Tt, Ti, Tc, Ta) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $email, $Competitie, $Tt, $Ti, $Tc, $Ta);

// Încearca executarea instruc?iunii SQL
if ($stmt->execute()) {
    // Redirec?ioneaza catre pagina principala a aplica?iei în caz de successs
    header("Location: Configurarepagina.php");
    exit;
} else {
    // În caz de eroare, afi?eaza un mesaj de eroare ?i închide conexiunea cu baza de date
    echo "Error: " . $sql . "<br>" . $conn->error;
    $stmt->close();
}

// Închide conexiunea cu baza de date
$conn->close();
?>