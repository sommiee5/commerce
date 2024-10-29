<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Product.php";
$pro = new Product;

$products = $pro->fetch_products();
// echo "<pre>";
//   print_r($products);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" type="assets/image/png" sizes="32x32" href="favicon.png">
    <title>Cohort 28 Class Project - We Love Adventures!</title>
</head>
<body>


<div class="container-fluid">
     
     <!--Navigation-->
     <div class="row " id="top">
         <div class="col mx-0 px-0 border-bottom border-light">
             <nav class="navbar bg bg-dark navbar-expand-lg menu">
                 <div class="container-fluid">
                   <a class="navbar-brand" href="index.php">
                     <img src="" width="130">
                   </a>
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarNavDropdown">
                     
                   </div>
                   
                                   


                               <div class="">
                     <a class="btn" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                       <img src="" width="30" style="border-radius: 50%; color: red;"> Hi admin</a>
                   
                    
                   </div>
              

                      <div style="width:3%"></div>

                    </div>
                </nav>


                <!--Logged in Link-->
                
                <!-- End Logged in link-->
            </div>
        </div>
<!--end navigation-->
  <!-- about-->

<div class="row">

<div class="col-md-3">
      
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; min-height: 500px;">
        <ul class="nav nav-pills flex-column mb-auto">
          
          <li>
            <a href="dashboard.php" class="nav-link link-body-emphasis active">
                <i class="fa fa-dashboard"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a href="update_category.php" class="nav-link link-body-emphasis">
                <i class="fa fa-edit"></i>
              Upload Category
            </a>
          </li>
          <li>
            <a href="add_product.php" class="nav-link link-body-emphasis">
             <i class="fa fa-users"></i>
              Update Products
            </a>
          </li>
          <li>
            <a href="view_products.php" class="nav-link link-body-emphasis">
                <i class="fa fa-table"></i>
              View Products
            </a>
        </li> 
        <li>
            <a href="view_category.php" class="nav-link link-body-emphasis">
                <i class="fa fa-table"></i>
              View Category
            </a>
        </li>          
          <li>
            <a href="logout.php" class="nav-link link-body-emphasis">
                <i class="fa fa-power-off"></i>
              Logout
            </a>
          </li>
        </ul>
     
      </div>
</div>


<div class="col-md-9 p-3">
    <!-- For the Dashboard-->
     
    <div class="row">
        <div class="col-md-12">
        <div class="row">
     <div class="col-md-12">
        
        <h5 class="my-3 text-center">View Products</h5>
        <?php
              if(isset($_SESSION['goodmsg'])){
               echo "<div class='alert alert-success'>".$_SESSION['goodmsg']."</div>";
               unset($_SESSION['goodmsg']);
             }
         ?>

         <?php
             if(isset($_SESSION['errormsg'])){
             echo "<div class='alert alert-danger'>".$_SESSION['errormsg']."</div>";
            unset($_SESSION['errormsg']);
             }
         ?>
        <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th scope="col">S/N</th>
                <th scope="col">Product name</th>
                <th scope="col">Product price</th>
                <th scope="col">Product category</th>                
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>           
             <?php
             $counter = 1;
             foreach($products as $product){
             ?>
             <tr>
               <td><?php echo $counter ++?></td>
               <td> <?php echo $product['products_name']?></td>
               <td> <?php echo $product['products_price']?></td>
               <td> <?php echo $product['cat_name']?></td>
               <td><a href="edit.php?id=<?php echo $product['products_id']; ?>" class="btn btn-primary">Edit</a></td>
             </tr>  
             <?php
             }
             ?>        
            </tbody> 
              
        </table>
    </div>
        </div>
           
        
        </div>
    </div>
    <!-- End the Dashboard-->



    


    

</div>
</div>
  <!-- end about-->
  
  
  
 
 <!--Local 3rd Party-->
 <!--section title-->
 
<!-- end section title-->

 
<!-- end Local 3rd Party-->
 
<div class="row bg-dark text-white" style="height: 10vh; margin-top: 40px;">
  <div class="col">
    <p class="text-center my-3"> &copy; 2024 Developed By Me</p>
  </div>
</div>

</div>
     
</body>
</html>