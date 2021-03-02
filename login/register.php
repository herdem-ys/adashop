<?php
    include(dirname(__FILE__)."/../dbconnection.php"); // HERSTELLEN DER DATENBANK VERBINDUNG

    $vorname = filter_input(INPUT_POST, 'vorname');
    $nachname = filter_input(INPUT_POST, 'nachname');
    $email = filter_input(INPUT_POST, 'email');
    $password_1 = filter_input(INPUT_POST, 'password_1');
    $password_2 = filter_input(INPUT_POST, 'password_2'); // Passwort wiederholung
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/loginregister.css">
        <link rel="stylesheet" type="text/css" href="../css/main-stylesheet.css">
        <script src="../js/sitescript.js"></script>
        <title>Registrierung</title>
    <body>
        
        <div class="main">

            <div class="wrapper">
            <a href="../index.php"><img src="../images/adashoplogo.png" width="230px"></a><br><br>
            <fieldset>
                <h1>Neues Konto</h1>
                <form action="register.php" method="post" html dont show username>
                    <table>
                        
                    <tr>
                            <td>
                                <p style="display:inline;color:red">* </p>
                                <p style="display:inline;">Vorname:</p>
                            </td>
                            <td>
                                <input type="text" name="vorname" autocomplete="on" required>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="display:inline;color:red">* </p>
                                <p style="display:inline;">Nachname:</p>
                            </td>
                            <td>
                                <input type="text" name="nachname" autocomplete="on" required>
                            </td>
                        </tr>

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
                        
                        <!-- PASSWORD WIEDERHOLEN -->
                        
                        <tr>
                            <td>           
                                <i class="fas fa-lock"></i> 
                                <p style="display:inline;color:red">* </p>                
                                <p style="display:inline;">Passwort wiederholen:</p>
                            </td>
                            <td>
                                <input type="password" name="password_2" required>
                            </td>
                        </tr>
                        
                        <!-- PASSWORD WIEDERHOLEN -->



                        <tr>
                            <td>
                                <p style="display:inline;">Ort:</p>
                            </td>
                            <td>
                                <input type="text" name="ort" autocomplete="on">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="display:inline;">PLZ:</p>
                            </td>
                            <td>
                                <input type="number" name="plz" autocomplete="on" max="99999">
                            </td>    
                         </tr>


                        <tr>
                            <td>
                                <p style="display:inline;">Straße:</p>
                            </td>
                            <td>
                                <input type="text" name="strasse" autocomplete="on">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p style="display:inline;">Hausnummer:</p>
                            </td>
                            <td>
                                <input type="number" name="hausnummer" autocomplete="on">
                            </td>
                        </tr>




                        <tr>
                            <td>
                                <p style="display:inline;">IBAN:</p>
                            </td>
                            <td>
                                <input type="text" name="iban" autocomplete="on" >
                            </td>
                        </tr>

                        
                
                        
                        
 
                        
                    </table>
                    <br>
                    <button type="submit" name="reg_user" value="register" style="width: 290px;height:50px">
                        registrieren
                    </button>
                </form>
                <br>
                </fieldset>      
            </div>

        </div>        
<br>

<a href="login.php">Bereits ein Konto?</a>
                <br><br>
        <footer>
        <div class="blur-rule"></div>
        <br><br>
        <a href="../impressum.php">Impressum&nbsp;&nbsp;</a>
        <a href="../datenschutz.html">Datenschutz&nbsp;&nbsp;</a>
        <a href="../kontakt.html">Kontakt&nbsp;</a>
       <br><br>
        <p>© </p>
        <p><script>document.write(new Date().getFullYear())</script></p>  <!-- aktuelles Jahr -->
        <p>...an-die-Arbeit e.V.</p>
        </footer>



    </body>
</html>