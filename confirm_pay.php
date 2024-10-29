<?php
  session_start();
  require_once "classes/User.php";
  require_once "classes/Payment.php";
  $u = new User;
  $pay = new Payment;

//   we want to fetch the details from orders and order_details table and display to the users
$orderdeets = $pay->get_orderby_ref($_SESSION['trxref']);
// echo "<pre>";
//     print_r($orderdeets);
// echo "</pre>";
?>
 

 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
 </head>
 <body>
 <div class="row mt-5">
    <div class="col-md-10 offset-md-1">
      <h3 style="margin-bottom:30px;" class="text-center heading-title"> CONFIRM ORDER</h3>
     
  </div>
</div>
<div class="row py-2">

<div class="col-md-8 offset-md-2">
<?php 
  if(isset($_SESSION['errormsg'])){
    echo "<div class='alert alert-danger'>". $_SESSION['errormsg']. "</div>";
    unset($_SESSION['errormsg']);

  };
 
  if(isset($_SESSION['good_msg'])){
    echo "<div class='alert alert-success'>". $_SESSION['good_msg']. "</div>";
    unset($_SESSION['good_msg']);

  };

?>
<?php
 


    // echo "<pre>";
    //     print_r($_SESSION);
    // echo "</pre>";
?>
<div class="alert alert-info">
    <h5>Please take note of your transaction reference: <?php echo $_SESSION['trxref']; ?></h5>
    <p>After clicking make payment, you will be sent to a page to enter your card details.</p>
</div>

    <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Products</th>               
                <th scope="col">Amount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>           
                <?php
                    $counter = 1;
                    $total = 0;
                    foreach($orderdeets as $value){
                        $total = $total + ($value['qty'] * $value['amount']);
                ?>
                    <tr>
                        <td><?php echo $counter++ ;  ?></td>
                        <td><?php echo $value['products_name'] ;  ?></td>
                        <td><?php echo number_format($value['amount'],2) ;  ?></td>
                        <td><?php echo $value['qty'] ;  ?></td>
                        <td><?php echo number_format($value['qty'] * $value['amount'],2) ;  ?></td>
                    </tr>

                <?php
                    }
                ?>
                <tr>
                    <td colspan="2">
                        <a href="emptycart.php" class="btn btn-danger">Cancel Order</a>
                    </td>
                    <!-- <td colspan="2">
                        <a href="index.php" class="btn btn-primary">Countinue shopping</a>
                    </td> -->
                    <td colspan="2">
                        <form action="paystack_step1.php" method="post">
                            <button class="btn btn-success" t> Make Payment</button>
                        </form>
                    </td>
                    <td> <?php echo number_format($total,2) ?></td>
                </tr>
             

             

            </tbody>
        </table>
 
 
</div>
</div>
  <!-- end about-->
   

      
 </body>
 </html>
 