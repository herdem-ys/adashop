<?php 
session_start();
include(dirname(__FILE__)."/dbconnection.php"); 

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $currentUserMail = $_SESSION['email'];
    $currentUserPassword = $_SESSION['password']; 
    $abfrage_konto = "SELECT * FROM `tblkunde` WHERE (`tblkunde`.`kMail` = '$currentUserMail' AND `tblkunde`.`kPasswort` = '$currentUserPassword');";
    $result = $con->query($abfrage_konto);
}

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
                                    <a href="/specialoffer.php"><li>Special-Offers</li></a>
                                        <li><a href="/buy.php">Jetzt-Kaufen</a></li>
                                        <li><a href="/kleidung.php">Kleidung</a></li>
                                        <li><a href="/spielsachen.php">Spielzeuge</a></li>
                                        <li><a href="/books_dvds.php">Bücher & DVDs</a></li>
                                        <?php 
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<li><a href='/shoppingcart.php' style='display: inline !important'>Warenkorb <img  src='https://p.kindpng.com/picc/s/714-7147174_png-file-svg-transparent-background-shopping-cart-icon.png' height='12px'></a></li>"; // WARENKORB ANZEIGEN?
    }else {
        echo "<li><a href='/login/login.php'>Anmelden</a></li>";
    }
    
    
    ?>
    
                                    </ul>
                                </div>
            </nav>
    </header>

<main>

<?php 
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>Willkommen zurück, " . $row["kVorname"] . " " . $row["kNachname"] . ".<p>";
                echo "
                <a href='produktgalerie.php'><button style='width: 470px;height:66px;'>ALLE ARTIKEL DURCHSTÖBERN</button></a>
                <a href='account.php'><button style='width: 470px;height:66px;'>ZUR KONTOÜBERSICHT</button></a>";
            }
        } 
        

    }else {
        echo "<a href='login/register.php'>Sie sind noch nicht angemeldet, bestimmte Funktionen sind nur im Kontoverbund verfügbar.</a><br><br>
              <a href='produktgalerie.php'><button style='width: 470px;height:66px;'>ALLE ARTIKEL DURCHSTÖBERN</button></a>";
    }
    
    
    ?>


<br><br>
<h1>ANGEBOTE NEU 2021<h1>
<a href="spielsachen.php"><img src="images/artikelbilder/werbung/1.jpg" width="100%"></a>
<a href="produktgalerie.php"><img src="images/artikelbilder/werbung/2.jpg" width="100%"></a>
<a href="spielsachen.php"><img src="images/artikelbilder/werbung/ad3.jpg" width="100%"></a>





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
    <br><br>
</body>
</html>



