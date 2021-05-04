<?php
include(dirname(__FILE__)."/dbconnection.php");


/* CODE BY HERDEM CAN YASIT */
/* GITHUB -> herdem-ys */
/* SHOPPING CART SYSTEM */

class Warenkorb {
    // Properties
    public $name;
    public $color;
  
    // Methods
    function set_name($name) {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
    function set_color($color) {
      $this->color = $color;
    }
    function get_color() {
      return $this->color;
    }
  }
  



?>
