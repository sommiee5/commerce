<?php
require_once "Db.php";
class Cart extends Db {
    private $dbconn;
    public function __construct(){
        $this->dbconn = $this->connect();
    }
    public function addbundle($id){
        if(isset($_SESSION['cartitems'])){
            // we will check if $id exits as a key in the array; that is if $_SESSION['cartitems'][$id]exists
            if(array_key_exists($id,$_SESSION['cartitems'])){//we have already added the resort center before, just increase the quantity by one
                $existing_qty = $_SESSION['cartitems'][$id];
                $_SESSION['cartitems'][$id]= $existing_qty +1;
            }else{//this particular resort has never been added to the cartitem array before
                $_SESSION['cartitems'][$id]=1;
            }
        }else{
            // we will create the location $id in the array and save quantity 1 into it
            $_SESSION['cartitems'][$id] = 1;
        }   
    }//once you have done this, call this method in addtocart.php (instead of method add) to see how it works.

    public function empty($id = null) {
        // If an ID is provided, remove only that specific item
        if ($id !== null) {
            unset($_SESSION['cartitems'][$id]);
        } 
        // If no ID is provided, clear the entire cart
        else {
            unset($_SESSION['cartitems']);
        }
    }
    

}
?>