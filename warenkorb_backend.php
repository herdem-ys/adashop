<?php

include(dirname(__FILE__)."/dbconnection.php");




class Warenkorb {

    public $bestelltUm;
    public $angelegtUm;
    public $bstID = 0;
    public $p_kundenID = 0;
    
    
    
    public function __construct() {
        $this->angelegtUm = date("Y-m-d H:i:s");   // DATETIME IN MSQL
        if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
            header('Location: login/register.php');
            exit;
        }else{
            $currentUserMail = $_SESSION['email'];
            $currentUserPassword = $_SESSION['password'];
            $p_kundenID = "SELECT *
                           FROM `tblkunde`
                           WHERE (`tblkunde`.`kMail`     = '$currentUserMail' AND
                                  `tblkunde`.`kPasswort` = '$currentUserPassword')";
            $con = mysqli_connect("localhost","adaKunde","geheim","adashop");
        $p_kundenIDQuery = $con->query($p_kundenID);
            
            
        if ($p_kundenIDQuery->num_rows > 0) {
            while($row = $p_kundenIDQuery->fetch_assoc()) {       
                $this->p_kundenID = $row["p_kundenNr"];
            }
        }


}   
            
            
            
        
        
        $sqlCreateOrder = "INSERT INTO tblbestellung (p_bstID, bstZeit, bstGesamtsumme, bstRabattsatz, f_kundenNr)
                           VALUES                    (NULL, " . date('Y-m-d H:i:s') . ", '0.00', '0', '$p_kundenID')";
                    $con = mysqli_connect("localhost","adaKunde","geheim","adashop");
        $result = $con->query($sqlCreateOrder);

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
        $this->$bestelltUm = date("Y-m-d H:i:s");
        $erstelleBestellung;
        $referenziereArtikelAusBestellung; // HILFSTABELLE BEFÜLLEN MIT ARTIKEL UND BESTELLUNG ID
    }
    


    
  }
  



?>
