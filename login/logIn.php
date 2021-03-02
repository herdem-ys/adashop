<?php
    include(dirname(__FILE__)."/../dbconnection.php"); // HERSTELLEN DER DATENBANK VERBINDUNG
  
    $email = filter_input(INPUT_POST, 'email');
    $password_1 = filter_input(INPUT_POST, 'password_1');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/loginregister.css">
        <link rel="stylesheet" type="text/css" href="../css/main-stylesheet.css">
        <script src="../js/sitescript.js"></script>
        <title>Anmeldung</title>
    <body>
        
        <div class="main">

            <div class="wrapper">
            <a href="../index.php"><img src="../images/adashoplogo.png" width="230px"></a><br><br>
            <a href="/login/login.php" style="text-align:center">LOGIN</a><br><br>
            <a href="/login/register.php" style="text-align:center">REGISTER</a><br><br>
            <a href="/login/produktgalerie.php" style="text-align:center">PRODUKTGALERIE</a><br><br>
            <br>
            <div class="blur-rule"></div><br>
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
                                <input type="password" name="password_1" required>
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
            </div>

        </div>        
<br>               
                <a href="register.php">Kein Konto?</a>
                <br><br>
        <footer>
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