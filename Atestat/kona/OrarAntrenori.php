<?php
session_start();

// Parameters for connecting to the database
$servername = "localhost";
$username = "obako";
$password = "10560";
$dbname = "obako";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start output buffering to capture HTML
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Club Kona Triathlon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Playfair Display', serif;
            display: flex;
            flex-direction: column;
            background: gray;
        }

        header {
            background-color: orange;
            height: 5vw;
            padding: 0.3vh 0.5vw;
            text-align: center;
            font-size: 1vw;
            color: white;
            text-shadow: -0.05vw -0.05vw 0.1vw #000;
        }

        .button {
            color: white;
            width: 100%;
            height: 100%;
            padding: 0.5vh 1vw;
            text-align: center;
            font-size: 1vw;
            transition-duration: 0.4s;
            cursor: pointer;
            margin: auto;
        }

        .button1 {
            background-color: orange;
            color: white;
            border: 0.1vw solid orange;
            text-align: center;
            line-height: 2;
            font-weight: bold;
            display: inline-block;
        }

        .button1 a {
            color: white;
            text-decoration: none;
        }

        .button1:hover {
            background-color: white;
            color: orange;
        }

        .button1:hover a {
            color: orange;
        }


	 .button2 {
            background-color: black;
            color: white;
            text-align: center;
            line-height: 2;
            font-weight: bold;
            display: inline-block;
		border: none;
        }

        .button2 a {
            color: white;
            text-decoration: none;
        }


        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        table {
            width: 76%;
            height: 90%;
            background: black;
            color: white;
            padding: 0.5vw 0.5vw;
            border: 1vw solid #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            table-layout: fixed;
        }

        th,
        td {
            width: 10vw;
            height: 10vh;
            text-align: center;
            font-size: 1.5vw;
        }
    </style>
</head>

<body>
    <header>
        <h2>Club Kona</h2>
    </header>
    <div class="container">
        <table border="5" cellspacing="0">
            <tr>
                <td>
                    <b>Antrenor/Ora</b>
                </td>
                <td>
                    <b>9:00-11:00</b>
                </td>
                <td>
                    <b>11:00-13:00</b>
                </td>
                <td>
                    <a href="OrarAntrenament.php"><button class="button button1">Rezervare noua</button></a>
                </td>
                <td>
                    <b>15:00-17:00</b>
                </td>
                <td>
                    <b>17:00-19:00</b>
                </td>
                <td>
                    <b>19:00-21:00</b>
                </td>
            </tr>

            <tr>
                <td>
                    <b>Dani B</b>
                </td>
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);
		if ($i == 3) {
                        echo "<td rowspan='5'>
                        <h2>P<br>A<br>U<br>Z<br>A<br></h2>
                    </td>";
                    }
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
		
                ?>
                    <td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td>
	<?php 
                    } else {
                        $row = null;
		?> 
				
                    <td>
            <form action="RezervariAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        	</td>
		 <?php		
                    }
		} ?>
            </tr>
		<tr>
                <td>
                    <b>Calin P</b>
                </td>
                <?php
                for ($i = 6; $i <= 10; $i++) {
                    // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
	?><td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td><?php
                    } else {
                        $row = null;
			?> 
				
                    <td>
            <form action="RezervariAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        </td>
				<?php } ?>
                    
                <?php } ?>
            </tr>
<tr>
                <td>
                    <b>Maria N</b>
                </td>
                <?php
                for ($i = 11; $i <= 15; $i++) {
                    // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
	                ?>
                    <td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td>
	<?php 
                    } else {
                        $row = null;
		?> 
				
                    <td>
            <form action="RezervariAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        	</td>
		 <?php		
                    }
		} ?>
            </tr>
<tr>
                <td>
                    <b>Andrei J</b>
                </td>
                <?php
                for ($i = 16; $i <= 20; $i++) {
                    // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
		                ?>
                    <td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td>
	<?php 
                    } else {
                        $row = null;
		?> 
				
                    <td>
            <form action="RezervariAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        	</td>
		 <?php		
                    }
		} ?>
            </tr>
<tr>
                <td>
                    <b>Radu G</b>
                </td>
                <?php
                for ($i = 21; $i <= 25; $i++) {
                   // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
		                ?>
                    <td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td>
	<?php 
                    } else {
                        $row = null;
		?> 
				
                    <td>
            <form action="RezervariiAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        	</td>
		 <?php		
                    }
		} ?>
            </tr>
<tr>
                <td>
                    <b>Tudor B</b>
                </td>
                <?php
                for ($i = 26; $i <= 30; $i++) {
                    // SQL query to fetch reservation details for the current ID
                    $sql = "SELECT * FROM antrenori WHERE ID = $i";
                    $result = $conn->query($sql);
			if ($i == 28) {
                        echo "<td>
                    	<a href='pagina_profil.html'><button class='button button1'>Inapoi</button></a></td>";}
	                if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        ?>
                    <td><?php echo $row !== null && isset($row['email']) ? $row['email'] : ''; ?></td>
			<?php 
                    } else {
                        $row = null;
			?> 
				
                    <td>
            <form action="RezervariAntrenor.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $i; ?>">
                <button type="submit" class="button button2">Rezerva acum</button>
            </form>
        	</td>
		 <?php
                    }
			
  		} ?>
            </tr>



        </table>
    </div>
</body>

</html>

<?php
// End output buffering and store the output in a variable
$html_output = ob_get_clean();

// Echo the HTML output
echo $html_output;

// Close the database connection
$conn->close();
?>
