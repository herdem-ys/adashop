<?php session_start(); ?>

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
<p style="font-size:45pt">

    <?php 
    
    $wochentage = array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag");
    $monate = array("Januar","Februar","M&auml;rz","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");

    $datum = "Heute ist der " . date('d.') . " " . $monate[date('n')-1] . " " .date('Y');
    echo $datum;
    
    
    ?>
 </p>
</body>
</html>



