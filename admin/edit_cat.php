<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Admin.php";
if(isset($_GET["cat_id"])){
    $id = $_GET["cat_id"];
    $admin = new Admin;
    $category = $admin->view_category_by_id($id);
    // print_r($category);
}else{
    header("location: update_category.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Document</title>
    <style>
      body {
        background-color: #f5f5f5;
      }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center">
      <div class="row w-100 justify-content-center align-items-center mt-5">
        <div class="col-6 pt-5">
            <form action="process/edit_cat_process.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" id="cat_name" name="cat_name" placholder="Category name" value="<?php echo $category["cat_name"] ?>">
                <input type="hidden" id="cat_name" name="cat_id" placholder="Category name" value="<?php echo $category["cat_id"] ?>">
              </div>
              <div class="pt-3">
                <button type="submit" class="btn btn-dark col-12">Edit category</button>
              </div>
             
            </form>
        </div>
      </div>
    </div>
</body>
</html>