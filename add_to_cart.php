<?php
     session_start();
     require_once "classes/Cart.php";
     if(isset($_POST['id']) && (int)$_POST['id']!=0){
        if(!isset($_POST['qnty'])){
         $cart = new Cart;
         $cart->addbundle($_POST['id']);
         $items = count($_SESSION['cartitems']);
         echo $items;
        }else{
            $cart = new Cart;
            $qty = $_POST['qnty'];
            $previous_qty = $_SESSION['cartitems'][$_POST['id']];

            if($qty > $previous_qty){
                $qty_diff = $qty - $previous_qty;
                
            }else{
                unset($_SESSION['cartitems'][$_POST['id']]);
                $qty_diff = $qty;
            }
            
            for($k =0; $k<$qty_diff; $k++){
                $cart->addbundle($_POST['id']);
            }
         
         $items = count($_SESSION['cartitems']);
         echo $items;
        }
         

     }else{
         
     }
?>