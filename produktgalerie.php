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


<div class="galleryWrapper">
<?php 

$abfrage_produkte = "SELECT *
                     FROM tblArtikel
                     INNER JOIN tblBild ON p_artID = f_artID";

$result = $con->query($abfrage_produkte);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {       
        echo "<div class='galleryItem'>
                <a target='_blank' href='" . $row["bildPfad"] . "'>
                    <img src='" . $row["bildPfad"] . "' alt='" . $row["artName"] . "' width='600' height='400'>
                </a>
                <div class='desc'>" . $row["artName"] . "<div class='price'><b>" . $row["artPreis"] . "€</b></div>
                </div>
              </div>";
    }
} else {
    echo "<p>Aktuell keine Produkte verfügbar :( </p>";
}

?>

  </div>


  
</main>
<br><br>
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



