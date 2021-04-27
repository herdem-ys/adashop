<?php
include(dirname(__FILE__)."/dbconnection.php");


/* CODE BY HERDEM CAN YASIT */
/* GITHUB -> herdem-ys */
/* SHOPPING CART SYSTEM */

class warenkorb{

    private $shoppingItems; // undefiniert

    public function addItemsToOrder($Item) { // Parameter
        $this->shoppingItems+=$Item; // Attributzugriff
    }

    public function removeItemsFromOrder($Item) { // Parameter
        $this->shoppingItems-=$Item; // Attributzugriff
    }

    public function testtest(){
        echo "HAT GEFUNZT";
    }

    public function startOrder($strassenname) { // Parameter
        $this->shoppingItems = $strassenname; // Attributzugriff
    }
}



?>
