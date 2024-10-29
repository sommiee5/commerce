<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
    <style>
        body {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
      <div class="row w-100 justify-content-center">
        <div class="col-6 pt-5">
          <h2>Login</h2>
            <form action="process/login_process.php" method="post">
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
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="pt-3">
                <button type="submit" name="btnsubmit" class="btn btn-dark col-12">Submit</button>
              </div>
             
            </form>
        </div>
      </div>
    </div>

   <script
      src="bootstrap/js/bootstrap.bundle.js"
      type="text/javascript"
    ></script>
</body>
</html>