<?php 

session_start(); 
include(dirname(__FILE__)."/dbconnection.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/main-stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="js/sitescript.js"></script>
    <title>An die Arbeit - Online Shop</title>
</head>
<body>
    <header>
            <a href="../index.php">
                <img src="../images/adashoplogo.png" width="230px">
            </a>
            <br>
            <nav>
                                <div class="appleNav">
                                    <ul>
                                        <li><a href="/specialoffer.php">Special-Offers</a></li>
                                        <li><a href="/buy.php">Jetzt-Kaufen</a></li>
                                        <li><a href="/kleidung.php">Kleidung</a></li>
                                        <li><a href="/spielsachen.php">Spielzeuge</a></li>
                                        <li><a href="/books_dvds.php">Bücher & DVDs</a></li>
                                        <li><a href="/login/login.php">Anmelden</a></li>
                                    </ul>
                                </div>
            </nav>
    </header>

<main>

<p style="font-size:45pt">

Bücher & DVD's
</p>

<div class="galleryWrapper">
    
<?php 

$abfrage_produkte = "SELECT * 
                     FROM tblArtikel
                     LEFT JOIN tblBild ON tblArtikel.p_artID = tblBild.f_artID
                     WHERE f_katID = 2";

$result = $con->query($abfrage_produkte);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {       
        echo "
        <div class='row'>
          <div class='column1' style='background-color:transparent;'>
        <img src='" . $row["bildPfad"] . "' alt='" . $row["artName"] . "' height='180'>
          </div>
          <div class='column2' style='background-color:black;'>
            <h2>" . $row["artName"] . "</h2>
            <p>" . $row["artBeschreibung"] . "</p>
            <button onclick='/* BESTELLUNG HIER ERSTELLEN */' style='width:100%;height:30px;margin-top:30px'>ZUM WARENKORB</button>
            </div>
        </div>";
    }

    /* close connection */
$con->close();
} else {
    echo "<p>Aktuell keine Produkte verfügbar :( </p>";
}





?>

  </div>
</main>

    <footer><br>
            <div class="blur-rule"></div>
            <br><br>
            <a href="impressum.php">Impressum&nbsp;&nbsp;</a>
            <a href="datenschutz.php">Datenschutz&nbsp;&nbsp;</a>
            <a href="kontakt.php">Kontakt&nbsp;</a>
        <br><br>
            <p>© </p>
            <p><script>document.write(new Date().getFullYear())</script></p>  <!-- aktuelles Jahr -->
            <p>...an-die-Arbeit e.V.</p>
    </footer>

</body>
</html>



