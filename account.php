<?php 
session_start(); 
include(dirname(__FILE__)."/dbconnection.php"); 

            $currentUserMail = $_SESSION['email'];
            $currentUserPassword = $_SESSION['password'];

            if(isset($_POST["logout"])){
                    session_start();
                    unset($_SESSION);
                    session_destroy();
                    session_write_close();
                    header('Location: login/register.php');
                    exit;
            }



            if(isset($_POST["deleteuser"])){
                    $sqlDeleteUser = "DELETE
                                    FROM tblKunde
                                    WHERE kMail='$currentUserMail' and kPasswort='$currentUserPassword'"; // VORRAUSGESETZT JEDE MAIL DARF NUR EINMAL REGISTRIERT WERDEN!!!
                    $result = $con->query($sqlDeleteUser);
                    session_start();
                    unset($_SESSION);
                    session_destroy();
                    session_write_close();
                    header('Location: login/register.php');
                    exit;
            }
    /* close connection */
    $con->close();
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
    <title>Kontoübersicht</title>
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
    echo "<li><a href='/login/shoppingcart.php'>Warenkorb</a></li>"; // WARENKORB ANZEIGEN?
}else {
    echo "<li><a href='/login/login.php'>Anmelden</a></li>";
}


?>

                                    </ul>
                                </div>
            </nav>
    </header>

<main>
                <br><br>
                <fieldset>
                        <h1>Kontoübersicht</h1>
<form action="account.php" method="post">     <!-- html dont show username  - austesten!!! -->
                            
    
    
<!-- ------------------------------------------------------------------------------------------------------------ 


<?php 



$abfrage_konto = "SELECT * FROM `tblkunde` WHERE (`tblkunde`.`kMail` = '$currentUserMail' AND `tblkunde`.`kPasswort` = '$currentUserPassword');";

$result = $con->query($abfrage_konto);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {       
        echo "
        <div class='row'>
          <div class='column2' style='background-color:black;text-align:left'>
            <h2>". $row["kNachname"] . ", " .$row["kVorname"] ."</h2>
            <p>" . $row["kGebDat"] . "</p> 
            <p>" . $row["gebDatum"] . "</p>
            <p>" . $row["kStrasse"] . "</p>
            <p>" . $row["kPlz"] . " " . $row["kOrt"] . " </p>
            <p>" . $row["kIban"] . "</p>
            </div>
        </div>";
    }

    /* close connection */
$con->close();
} else {
    echo "<p>Benutzersuchfehler!!</p>";
}





?>


------------------------------------------------------------------------------------------------------------ -->
    
    
                            <br>
                            <button type="submit" name="logout" value="logout" style="width: 270px;height:34px;">
                                KONTO ABMELDEN
                            </button><br><br>
                            <button type="submit" name="deleteuser" value="deleteuser" style="width: 270px;height:34px;color:black" id="deleteUser">
                                KONTO LÖSCHEN
                            </button>
                    </form>

    </fieldset>

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



