<?php 

session_start(); 

include(dirname(__FILE__)."/dbconnection.php");
include(dirname(__FILE__)."/warenkorb_backend.php");

$warenKorb = new Warenkorb();


if(isset($_POST["addToWarenkorb"])){
    $warenKorb->addItemToOrder($_POST["addToWarenkorb"],$_POST["stueckanzahl"]);
    unset($_POST["addToWarenkorb"]);
}

if(isset($_POST["removeFromWarenkorb"])){
    $warenKorb->removeItemFromOrder($_POST["removeFromWarenkorb"],$_POST["stueckanzahl"]);
    unset($_POST["removeFromWarenkorb"]);
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
                                        <li><a href="/specialoffer.php">Special-Offers</a></li>
                                        <li><a href="/buy.php">Jetzt-Kaufen</a></li>
                                        <li><a href="/kleidung.php">Kleidung</a></li>
                                        <li><a href="/spielsachen.php">Spielzeuge</a></li>
                                        <li><a href="/books_dvds.php">Bücher & DVDs</a></li>
                                        <?php 
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<li><a href='/shoppingcart.php'>Warenkorb</a></li>"; // WARENKORB ANZEIGEN?
    }else {
        echo "<li><a href='/login/login.php'>Anmelden</a></li>";
    }
    
    
    ?>
    
                                    </ul>
                                </div>
            </nav>
    </header>

<main>


<div class="galleryWrapper">
    
<?php 

$abfrage_produkte = "SELECT * 
                     FROM tblArtikel
                     LEFT JOIN tblBild ON tblArtikel.p_artID = tblBild.f_artID";

$result = $con->query($abfrage_produkte);

if ($result->num_rows > 0) {
        echo "<form action='produktgalerie.php' method='post' id='produkte'>";
    while($row = $result->fetch_assoc()) {       

        echo "<div class='row'>
          <div class='column1' style='background-color:transparent;'>
        <img src='" . $row["bildPfad"] . "' alt='" . $row["artName"] . "' height='180'>
          </div>
          <div class='column2' style='background-color:black;'>
            <h2>" . $row["artName"] . "</h2>
            <p>" . $row["artBeschreibung"] . "</p>
            <label for='anzahl'>   Menge: </label>
                <select id='anzahl' name='stueckanzahl' form='produkte'>
                  <option value='1'>1 Stück (" . $row["artPreis"]   .   "€) </option>
                  <option value='2'>2 Stück (" . $row["artPreis"]*2 .   "€)</option>
                  <option value='3'>3 Stück (" . $row["artPreis"]*3 .   "€)</option>
                  <option value='4'>4 Stück (" . $row["artPreis"]*4 .   "€)</option>
                  <option value='5'>5 Stück (" . $row["artPreis"]*5 .   "€)</option>
                  <option value='6'>6 Stück (" . $row["artPreis"]*6 .   "€)</option>
                  <option value='7'>7 Stück (" . $row["artPreis"]*7 .   "€) </option>
                  <option value='8'>8 Stück (" . $row["artPreis"]*8 .   "€)</option>
                  <option value='9'>9 Stück (" . $row["artPreis"]*9 .   "€)</option>             
                </select>
                <br><br>
                <h2 style='display:inline'>Einzelpreis: " . $row["artPreis"] . " €</h2><br>
            <button type='submit' name='addToWarenkorb' value=" . $row["p_artID"] . " style='width:100%;height:30px;margin-top:0px'>ZUM WARENKORB</button>
            </div>
        </div>";
    }
    echo "</form>";

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



