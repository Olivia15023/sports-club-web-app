<?php
session_start();
    // Conectare la baza de date
    $servername = "localhost";
    $username = "obako";
    $password = "10560";
    $dbname = "obako";

    $conn = new mysqli($servername, $username, $password, $dbname);
  
    // Preia datele trimise prin POST
    $email = $_POST['email'];
    $password = $_POST['psw'];

    $sql = "SELECT * FROM utilizatori WHERE email='$email' AND parola='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
	$_SESSION['email'] = $email;
        header("Location: pagina_profil.html");
        exit;
    } else {
            header("Location: paginap.html");
    }

    // Închide conexiunea la baza de date
    $conn->close();
?>