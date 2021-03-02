<?php
    $host = "localhost";        
    $dbusername = "root"; // SOLLTE FÜR SICHERHEIT EINGERICHTET WERDEN // EXTRA BENUTZER!!
    $dbpassword = "";
    $dbname = "adashop";  

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname); // VERBINDUNG
?>