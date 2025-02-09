<?php
//Definizione Variabili
$host = "localhost";
$db = "Romanzi";
$user = "root";
$pass = "";
$connection = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita: " . mysqli_connect_error() );

// Recupero del nome dell'autore dalla query string
$nomeAutore = isset($_GET['nome']) ? $_GET['nome'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP ES9 </title>
</head>
<body>

    <div class="romanzi">
        <h2> Romanzi Autore: <?php echo $nomeAutore ?></h2>
        <table>
            <tr>
                <th> CodiceR </th>
                <th> Titolo </th>
                <th> Anno </th>
            </tr>
            <?php
                $query = " SELECT * FROM Romanzi R WHERE R.NomeAutore =  '$nomeAutore'";
                $result = mysqli_query($connection, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
                while($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
                    echo "
                        <tr>
                            <td>$row[CodiceR]</td>
                            <td>$row[Titolo]</td>
                            <td>$row[Anno]</td>
                        </tr>
                    ";
                } //solo associativo

            ?>
        </table>
    </div>
    
    <center>
        <a href="../index.php"> Ritorna alla Homepage </a>
    </center>
</body>
</html>