<?php
    session_start();
    include(dirname(__FILE__)."/../dbconnection.php"); // HERSTELLEN DER DATENBANK VERBINDUNG
  
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo 'Sind sie bereits eingeloggt!';
        header('Location: ../index.php');
        exit;
    } else if(isset($_POST["email"]) && isset($_POST["password"]) ){

            $email = filter_input(INPUT_POST, 'email');
            $password = md5(filter_input(INPUT_POST, 'password'));


        

        $sqlLoginUser = "SELECT *
                          FROM tblKunde
                          WHERE kMail='$email' and kPasswort='$password'";

        $result = $con->query($sqlLoginUser);
    
        while ($row = $result->fetch_row()) {
            // Die Felder der jeweiligen Zeile sind jetzt im Array $row enthalten.
           }
           
    
        // If the result matched $username and $password, the table row must be one row
        if($result){
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;                   
                
                echo 'Eingeloggt!';
                header('Location: ../index.php');
                exit;
        }else {
            echo "Bitte prüfen sie ihre Eingaben!";
        }
    }

    /* close connection */
    $con->close();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/main-stylesheet.css">
        <link rel="stylesheet" type="text/css" href="/css/navbar.css">
        
        <link rel="stylesheet" type="text/css" href="css/loginregister.css">
        <script src="../js/sitescript.js"></script>
        <title>Anmeldung</title>
    <body>
        <header>
            <a href="../index.php">
                <img src="../images/adashoplogo.png" width="230px">
            </a>
            <br>
            <nav>
                                <div class="appleNav">
                                    <ul>
                                        <li><a href="../specialoffer.php">Special-Offers</a></li>
                                        <li><a href="../buy.php">Jetzt-Kaufen</a></li>
                                        <li><a href="../kleidung.php">Kleidung</a></li>
                                        <li><a href="../spielsachen.php">Spielzeuge</a></li>
                                        <li><a href="../books_dvds.php">Bücher & DVDs</a></li>
                                        <li><a href="../login/login.php">Anmelden</a></li>
                                    </ul>
                                </div>
            </nav>
        </header>

        <main>
                <br><br>
                <fieldset>
                        <h1>Anmelden</h1>
                        <form action="login.php" method="post">     <!-- html dont show username  - austesten!!! -->
                            <table>
                                
                                <!-- EMAIL -->
                                
                                <tr>
                                    <td>
                                        <p style="display:inline;color:red">* </p>
                                        <p style="display:inline;">E-Mail:</p>
                                    </td>
                                    <td>
                                        <input type="text" name="email" autocomplete="on" required>
                                    </td>
                                </tr>
                                
                                <!-- EMAIL -->
                                
                                
                                <!-- PASSWORD -->
                                
                                <tr>
                                    <td>           
                                        <p style="display:inline;color:red">* </p>                
                                        <p style="display:inline;">Passwort:</p>
                                    </td>
                                    <td>
                                        <input type="password" maxlength="20" name="password" required>
                                    </td>
                                </tr>
                                
                                <!-- PASSWORD -->
                                
                                
                            </table>
                            <br>
                            <button type="submit" name="log_user" value="login" style="width: 270px;height:34px">
                                einloggen
                            </button>
                        </form>
                        </fieldset>      
       
                <br>               
                <a href="register.php" class="optionLink1">Kein Konto?</a>
                <br><br>
        </main>

        <footer>
                <br>
                <div class="blur-rule"></div>
                <br><br>
                <a href="../impressum.php">Impressum&nbsp;&nbsp;</a>
                <a href="../datenschutz.php">Datenschutz&nbsp;&nbsp;</a>
                <a href="../kontakt.php">Kontakt&nbsp;</a>
                <br><br>
                <p>© </p>
                <p><script>document.write(new Date().getFullYear())</script></p>  <!-- aktuelles Jahr -->
                <p>...an-die-Arbeit e.V.</p>
        </footer>


    </body>
</html>