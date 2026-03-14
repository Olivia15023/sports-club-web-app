<?php
session_start();

$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

// Conectarea la baza de date MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extrage CNP-ul (Codul Numeric Personal) al utilizatorului din sesiune
$email = $_SESSION['email'];

// Interogare SQL pentru a selecta programarile utilizatorului specific, folosind CNP-ul din sesiune
$sql = "SELECT * FROM profil WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Afi?are programari �ntr-un tabel HTML
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/mystyle5.css'>
    <script src='js/myscript5.js'></script> 
    <title>Club Kona</title>
    <style>
    
        table {
            width: 50%; /* Setează lățimea tabelului la 80% din lățimea ecranului */
            border-collapse: collapse; /* Combina marginile celulelor */
            float: right; /* Așează tabelul în dreapta */
            margin-top: 100px; 
        }
        th, td {
            padding: 8px; /* Adaugă spațiu de 8px în jurul conținutului celulelor */
            text-align: left; /* Aliniere text la stânga */
            border: 1px solid black; /* Adaugă o linie solidă între celule */
        }
    </style>
</head>
<body style='background-color: gray;'>

    <div class='iconita' onclick='afiseazaButoaneleSuplimentare()'>
        <img src='imagini/pozaprofil.jpg' class='img'>
    </div>

    <div id='butoaneSuplimentare' class='butoane-suplimentare'>
          
        <a href='pagina_profil.html' style='text-decoration: none;'><button id='butonpaginaprofil'>Pagina profil</button></a>     
        <button class='logout-btn' onclick='redirectPaginaPrincipala()'>Logout</button> 
           
    </div>
    
    <h1>Kona Triathlon Club Timișoara</h1>
    
    <form action='configurareprofil.php' method='POST' id='profil' style='position: absolute; top: 30%; left: 3%;'>
	<p style=' font-weight: bold;line-height: 2;font-size: 22px;'>Configurare Profil</p>
        <p>Competitie:</p>
        <input type='text' name='Competitie' maxlength='30' required='' placeholder='Introduceti numele competitiei' oninvalid='this.setCustomValidity('Va rugam introduceti numele competitiei')' oninput='setCustomValidity('')'>
        <br>
        <p>Timp total:</p>
        <input type='text' name='Tt' value='' required='' placeholder='Introduceti timpul total' oninvalid='this.setCustomValidity('Va rugam introduceti timpul total')' oninput='setCustomValidity('')'>
        <br>
	<p>Timp inot:</p>
        <input type='text' name='Ti' value='' required='' placeholder='Introduceti timpul inotat' oninvalid='this.setCustomValidity('Va rugam introduceti timpul inotat')' oninput='setCustomValidity('')'>
        <br>
	<p>Timp ciclism:</p>
        <input type='text' name='Tc' value='' required='' placeholder='Introduceti timpul pedalat' oninvalid='this.setCustomValidity('Va rugam introduceti timpul pedalat')' oninput='setCustomValidity('')'>
        <br>
	<p>Timp alergare:</p>
        <input type='text' name='Ta' value='' required='' placeholder='Introduceti timpul alergat' oninvalid='this.setCustomValidity('Va rugam introduceti timpul alergat')' oninput='setCustomValidity('')'>
        <br>
        <br>
        <button type='submit'>Inregistreaza datale noi</button>
      </form>
	";

//<button id='butonConfigurare' onclick='redirectPagina1('Configurareprofil.php')'>Configurare profil</button> 
// Verifica daca exista programari
if ($result->num_rows === 0) {
    echo "<p style='font-size: 2vw; color: orange;'>Nu aveti nicio inregistrare</p>";
} else {
    // Afi?eaza programarile �ntr-un tabel
    echo "<table >
            <tr>
                <th>Competitie</th>
                <th>Timp total</th>
                <th>Timp inot</th>
                <th>Timp ciclism</th>
		<th>Timp alergare</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        
        echo "<tr>
                <td>" . $row['Competitie'] . "</td>
                <td>" . $row['Tt'] . "</td>
                <td>" . $row['Ti'] . "</td>
                <td>" . $row['Tc'] . "</td>
		<td>" . $row['Ta'] . "</td>
            </tr>";
    }
    
    echo "</table>";
}

echo "</section>
</body>
</html>";
$stmt->close();
$conn->close();
?>
