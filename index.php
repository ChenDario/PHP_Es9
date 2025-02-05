<?php
//Definizione Variabili
$host = "localhost";
$db = "Romanzi";
$user = "root";
$pass = "";
$connection = mysqli_connect($host, $user, $pass, $db) or die("Connessione non riuscita: " . mysqli_connect_error() );
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/table.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP ES9 </title>
</head>
<body>
    
    <div class="autori">
        <table>
            <tr>
                <th> Autore </th>
                <th> Anno Nascita </th>
                <th> Anno Morte </th>
                <th> Nazione</th>
            </tr>
            <?php
                $query = "SELECT * FROM Autori";
                $result = mysqli_query($connection, $query) or die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
                while($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)){
                    echo "
                        <tr>
                            <td><a href='pages/romanzi.php?nome=$row[NomeAutore]'>$row[NomeAutore]</a></td>
                            <td>$row[AnnoN]</td>
                            <td>$row[AnnoM]</td>
                            <td>$row[Nazione]</td>
                        </tr>
                    ";
                } //solo associativo
            ?>
        </table>
    </div>

    <?php
    // chiusura della connessione
    mysqli_close($connection) or die ("<br>Errore di chiusura" . mysqli_error($connessione) . " ". mysqli_errno($connessione));
    ?>
</body>
</html>