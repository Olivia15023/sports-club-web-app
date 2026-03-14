<?php
// Conectare la baza de date
$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

// Creează conexiunea
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

// Preia datele trimise din formular și escapiă caracterele speciale
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['psw']);
$password_repeat = mysqli_real_escape_string($conn, $_POST['psw-repeat']);

// Verifică dacă parolele coincid
if ($password !== $password_repeat) {
    die("Parolele nu coincid. Te rugăm să introduci aceeași parolă în ambele câmpuri.");
}

// Verifică dacă adresa de email este deja înregistrată
$sql_check = "SELECT * FROM utilizatori WHERE email='$email'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "Această adresă de email este deja înregistrată.";
} else {
    // Inserează datele în baza de date (folosind declarații pregătite)
    $sql = "INSERT INTO utilizatori (email, parola) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    session_start();
    $_SESSION['email'] = $email;

    // Verifică dacă pregătirea declarației a avut succes
    if ($stmt) {
        // Leagă parametrii și execută declarația
        $stmt->bind_param("ss", $email, $password);
        if ($stmt->execute()) {
            header("Location: Configurarepagina.php");
            exit;
        } else {
            header("Location: paginap.html");
        }
    } else {
            header("Location: paginap.html");
    }
}

// Închide conexiunea la baza de date
$conn->close();
?>