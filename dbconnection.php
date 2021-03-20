<?php
    $host = "localhost";        
    $dbusername = "root"; // SOLLTE FÜR SICHERHEIT EINGERICHTET WERDEN // EXTRA BENUTZER!!
    $dbpassword = "";
    $dbname = "adashop";  

    $con = new mysqli($host, $dbusername, $dbpassword, $dbname); // VERBINDUNG

    if ($con->connect_error) { // VERBINDUNG TESTEN
        die("Connection failed: " . $con->connect_error);
      }
?>