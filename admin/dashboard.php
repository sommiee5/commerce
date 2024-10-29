<?php
session_start();
require_once "admin_guard.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome/css_all/all.css">
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
                          <img src="" width="30" style="border-radius: 50%;"> Hi admin</a>
                      
                       
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
            <h5 class="my-3">Welcome somto </h5>
            <p>You are logged in, plesae make use of the side menu to carry out tasks on this platform, you can sign out when you are done.</p>
           
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Total Pictures</div>
                        <div class="card-body">
                          <h5 class="card-title text-center">10</h5>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Total Bookings</div>
                        <div class="card-body">
                          <h5 class="card-title text-center">120</h5>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Total Tickets</div>
                        <div class="card-body">
                          <h5 class="card-title text-center">10</h5>                           
                        </div>
                    </div>
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