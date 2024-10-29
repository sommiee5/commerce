<?php
session_start();
require_once "admin_guard";
require_once "classes/Center.php";



?>

  <!-- about-->

<div class="row">

<?php  require_once "partials/center_menu.php"; ?>



<div class="col-md-9 p-3">
    <!-- For the Dashboard-->
     
    <div class="row">
        <div class="col-md-12">
            <h5 class="my-3">Welcome <?php echo $resort_data['name']; ?> </h5>
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

<?php
     include_once "partials/footer.php";
?>