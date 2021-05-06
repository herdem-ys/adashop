<?php

include(dirname(__FILE__)."/dbconnection.php");


class Warenkorb {

    public $bestellZeit;
    public $warenIDListe = array(array()); // HIER SIND NUR DIE ID´s DER JEWEILIGEN ARTIKEL, MIT DEREN BESTELLMENGEN
    
    
    public function __construct() {
        echo $this->bestellZeit;    // DATETIME IN MSQL
    }
    
    

    public function addItemToOrder($itemToAdd, $quantity){
        echo "<br>DIE FUNKTION addItemToOrder() WURDE MIT FOLGENDEN PARAMETERN AUFGERUFEN!<br>";
        echo "(" .$itemToAdd . "," . $quantity . ")";
    }
    
    
    public function removeItemFromOrder($itemToRemove, $quantity){
        echo "<br>DIE FUNKTION removeItemFromOrder() WURDE AUFGERUFEN!<br>";
        echo "(" .$itemToRemove . "," . $quantity . ")";
    }
    
    
    public function bestellungAufgeben($name) {
        $this->bestellZeit = date("Y-m-d H:i:s");
        $erstelleBestellung;
        $referenziereArtikelAusBestellung; // HILFSTABELLE BEFÜLLEN MIT ARTIKEL UND BESTELLUNG ID
    }
    


    
  }
  



?>
