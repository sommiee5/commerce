<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Product.php";
require_once "classes/Admin.php";
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $pro = new Product;
    $admin = new Admin;
$categories = $admin->view_all_category();
$product = $pro->fetch_product_by_id($id);
}else{
    header("Location:edit.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css_all/all.css" />
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
        <div class="col-6">
            <h3 class="text-center">Update Product</h3>

        <form action="process/update_process.php" method="POST" enctype="multipart/form-data">
          <div class="form-group pb-3">
            <input type="text" name="prod_name" id="product-name" placeholder="Product name" class="form-control p-3" value="<?php echo $product['products_name']?>">
          </div>

          <div class="form-group pt-3">
            <input type="number" class="form-control p-3" id="price" name="prod_price" placeholder="Enter product price" value="<?php echo $product['products_price']?>">
         </div>

         <div class="form-group pt-3">
          <label for="description">Description:</label>
          <textarea class="form-control" id="description" name="prod_description" rows="4" placeholder="Enter product description"><?php echo $product['products_description']?></textarea>
        </div>

         <div class="form-group mt-3">
          <label for="categorySelect">Select Category</label>
          <select class="form-control" id="categorySelect" name="prod_category">
            <?php
              foreach($categories as $category) {
                ?>
                   
                    <option 
                    <?php 

                    if($product['products_categoryid']== $category['cat_id'])
                    {?> 
                    selected 
                    <?php 
                        }?>  value="<?php echo $category['cat_id']?>"> <?php echo $category["cat_name"]?></option>
                  
                <?php
            }
            ?>
            
          </select>
        </div>
        <div class="form-group pt-3">
          <label for="image">Product Image:</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>      
        <input type="hidden" name='prod_id' value="<?php echo $id?>">
        <div class="pt-3">
          <button type="submit" class="btn btn-dark col-12" name="subbtn">Edit product</button>

        </div>
        </form>

        <form action="process/delete_process.php" method="post">
          <div>
            <input type="hidden" value="<?php echo $id?>" name="product_id">
          </div>
         <div class="mt-3">
             <button type="submit" class="btn btn-danger col-12" name="delbtn">Delete product</button>
         </div>
         
       </form>
      </div>  
    </div>
   </div> 
</body>
</html>