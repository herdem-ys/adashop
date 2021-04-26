<?php

session_start(); 

include(dirname(__FILE__)."/dbconnection.php");


/* CODE BY HERDEM CAN YASIT */
/* GITHUB -> herdem-ys */
/* SHOPPING CART SYSTEM */

class warenkorb{

    private $shoppingItems; // undefiniert

    public function addItemsToOrder($strassenname) { // Parameter
        $this->shoppingItems = $strassenname; // Attributzugriff
    }


    public function startOrder($strassenname) { // Parameter
        $this->shoppingItems = $strassenname; // Attributzugriff
    }
}



?>
