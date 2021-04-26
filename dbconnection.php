<?php
    $host = "localhost";        
    $dbusername = "adaKunde"; 
    $dbpassword = "geheim";
    $dbname = "adashop";  

    $con = new mysqli($host, $dbusername, $dbpassword, $dbname); // VERBINDUNG

    if ($con->connect_error) { // VERBINDUNG TESTEN
        die("Connection failed: " . $con->connect_error);
      } else {
        $con->query("SET NAMES 'utf8'"); // FÜR UMLAUTE
      }
?>