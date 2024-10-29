<?php
session_start();
require_once "classes/Product.php";
$pro = new Product();

$products = $pro->fetch_products();
$products = $pro->fetch_all_products();

// $pro_limits = $pro->fetch_products_limit();

if(isset($_SESSION['cartitems'])){
$item_count = count($_SESSION['cartitems']);
$items = $_SESSION['cartitems'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css_all/all.css" />
    <link rel="icon" type="image/jpg" sizes="32x32" href="partials/logo.jpg">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Anton&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="animate.min.css">
    <!-- <link rel="stylesheet" href="css/style.css" /> -->

    <title>Document</title>
  <style>
        {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
    font-family: 'Poppins', sans-serif;
    background-color: #f5f5f5;
    }


    .nav-header {
    font-size: 25px;
    margin-left: 20px;
    }

    /*navbar*/
    .links {
    gap: 30px;
    margin-right: 310px;
    cursor: pointer; 
    }

    .links a:hover {
      border-bottom: 1px solid #f5f5f5;
    }


    .navbar{
    width: 100%;
    position: absolute;
    position: fixed;
    background-color: transparent !important;
    color: #f5f5f5 !important;
    transition: background-color 0.4s ease;
    z-index: 10000;
    }

    .navbar.bg-scrolled {
      background-color: rgba(0,0,0,0.8) !important;
      transition: background-color 0.4s ease;
    }

    .menu {
      cursor: pointer;
    }

    .dropdown-toggle::after {
      transition: transform 0.2s;
    }
    .dropdown-toggle[data-bs-toggle="dropdown"].show::after {
      transform: rotate(180deg);
    }

    .countdiv {
      position: relative;
    }

    .cartcount {
      font-size: 10px;
      position: absolute;
      top: -5px;
      right: -7px;
    }

    /*login*/
    .loginface img {
      width: 100%;
    }

    .login-form-container {
      display: flex;
      align-items: start;
    }

    .login-info {
      margin-top: 160px;
      padding-left: 60px;
    }

    .offcanvas{
      width: 35% !important;
      z-index: 20000;
    }

    .custom-offcanvas{
    width: 30% !important;
    background: #f5f5f5;
    transition: none;
    }

    .banner {
    width: 100%;
    height: 100vh;
    background-image: url("images/banner1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    /* background-attachment: fixed; */
    position: relative;
    }

    .shop {
      text-transform: uppercase;
      border-radius: 3px;
      background: #f5f5f5;
      text-decoration: none;
      color: black;
      position: absolute;
      left: 30px;
      bottom: 60px;
      padding: 10px 30px;
    }

    .shop:hover {
      background: ghostwhite;
    }

    .summer-sales {
      position: absolute;
      left: 30px;
      bottom: 100px;
      font-size: 40px;
      font-weight: 500;
    }

    .add-to-cart-btn{
      width: 100%;
      position: absolute;
      top: 86%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none;
      background-color: #f5f5f5;
      color: black;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      padding: 10px 60px;
    }

    .femalepro {
      width: 100%;
      position: relative;
      display: inline-block;
    }

    .femalepro a {
      text-decoration: none;
    }


    .carousel {
      padding-top: 80px;
      z-index: 2;
    }

    .carousel-inner {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      object-position: top;
    }


    .shopmen{
      text-transform: uppercase;
      border-radius: 3px;
      background: white;
      text-decoration: none;
      color: black;
      position: absolute;
      left: 60px;
      bottom: 50px;
      padding: 10px 200px;
    }

    .shopwomen{
      text-transform: uppercase;
      border-radius: 3px;
      background: white;
      text-decoration: none;
      color: black;
      position: absolute;
      left: 70px;
      bottom: 50px;
      padding: 10px 200px;
    }

    .mens-popular {
      width: 100%;
      position: relative;
      display: inline-block;
    }

    .mens-popular a {
      font-size: 14px;
      text-decoration: none;
    }


    .third-banner {
      width: 100%;
      object-fit: cover;
      padding-top: 80px;
    }

    .third-banner img {
      width: 100%;
      height: 80vh;
      object-fit: cover;
    }

    .display {
      width: 30%;
      object-fit: cover;
      padding-top: 80px;
    }

    .display img {
      width: 100%;
      height: 16vh;
      object-fit: cover;
      object-position: top;
      border-radius: 2%;
      padding-bottom: 6px;
    }

    .shopall {
      position: absolute;
      left: 80%;
      transform: translateX(-80%);
    
    }

    .shopall a {
      font-size: 12px;
      color: white;
      text-decoration: none;
      background: black;
      padding: 10px 25px;
      border-radius: 3px;
    }

    .fourth-banner{
      width: 100%;
      object-fit: cover;
      overflow: hidden;
      padding-top: 120px;
    }
    .fourth-banner img{
      width: 100%;
      height: 135vh;
      object-fit: cover;
      object-position: center; 
      padding: 0px;
      margin: 0px;
    }

    .men-links a {
      text-decoration: none;
      color: black;
    }

    .footer {
      background: black;
      height: 70vh;
      color: #f5f5f5;
      padding-top: 80px;
    }

    .newsletter {
      padding-left: 100px;
    }

    .copyright, .policy, .terms, .info{
      font-size: 16px;
      color: #f5f5f5; 
    }

    .popular {
      padding-top: 90px;
    }

    #search-input {
      border-radius: 20px;
    }

    #search-results {
    border: 1px solid #ccc;
    background: white;
    position: absolute;
    z-index: 1000;
    width: 100%; /* Make it full width */
    max-height: 300px; /* Set a max height */
    overflow-y: auto; /* Add scroll if needed */
    display: none; /* Initially hidden */
    padding-left: 10px; 
}

  .product-item {
      display: flex; /* Flex for alignment */
      align-items: center; /* Center items vertically */
  }

  .product-item img {
      margin-right: 10px; /* Space between image and text */
  }



</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0 mx-0">
                <!--navbar-->
                <nav class="navbar bg navbar-expand-lg">
                    <div class="container-fluid">
                      <a class="navbar-brand text-uppercase nav text-light nav-header fw-bold" href="index.php">unruly</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!--links-->
                        <div class="col px-0" id="nav-links">
                            <div>
                                <ul class="d-flex justify-content-center list-unstyled pt-3 text-light links">
                                <li class="product-item">
                                    <a  class="text-light men-color text-decoration-none" href="men.php">
                                      Men
                                    </a>
                                </li>
                                    <li class="product-item">
                                      <a href="women.php" class="nav-link"> Women</a>
                                    </li>
                                    <li class="product-item">
                                      <a href="accessories.php" class="text-decoration-none nav-link">Accessories</li></a>
                                    <li class="product-item">
                                      <a href="shop.php" class="nav-link">Shop</li></a>                          
                                  </ul>
                            </div>
                        </div>

                        <div class="col px-5 position-relative" id="search-container" style="display: none;">
                          <input type="text" id="search-input" placeholder="Search..." class="form-control" style="width: 100%;">
                          
                          <!-- Search results dropdown -->
                          <div id="search-results" class="dropdown-menu w-100" style="display:none; position: absolute; top: 100%; left: 0;">
                              <!-- Results will appear here -->
                          </div>
                      </div>

                          <!--language dropdown-->
                          <div class="col-md-4">
                            <div class="d-flex align-items-center justify-content-end me-5">
                                <div class="language-dropdown dropdown menu">
                                    <span
                                      class="language ps-3 fw-normal m-4 text-light dropdown-toggle"
                                      id="languageDropdown"
                                      data-bs-toggle="dropdown"
                                      aria-expanded="false"
                                      >EN</span
                                    >
                                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                      <li><a class="dropdown-item" href="#">English</a></li>
                                      <li><a class="dropdown-item" href="#">Francais</a></li>
                                      <li><a class="dropdown-item" href="#">Spanish</a></li>
                                    </ul>
                                  </div>

                            
                              <a href="#" id="search-icon">
                                <i class="fa-solid fa-search text-light me-2"></i>
                              </a>
                              
                            
                            
                               <!--dropdown menu-->
                               <div class="dropdown">
                                    <a href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user ms-2 text-light"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li><a class="dropdown-item" href="login.php">Login</a></li>
                                        <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
                                    </ul>
                                </div>
                          
                             <!--offcanvas cart-->
                             <div class="countdiv">
                                <a
                                  class="custom"
                                  data-bs-toggle="offcanvas"
                                  href="#offcanvasCart"
                                  role="button"
                                  aria-controls="offcanvasExample"
                                  style="text-decoration: none; color:white;"
                                >
                                <i class="fa-solid fa-bag-shopping text-light ms-3"></i>
                                  <?php
                                   if(isset($item_count)){
                                  ?>
                                  <span class='bg-danger px-1 cartcount' style="border-radius: 80%;"><?php echo $item_count ?></span>
                                  <?php
                                 }
                                 ?>
                                </a>
                              </div>
                              <div>
                                <a href="order_summary.php">
                                  <i class="fa-solid fa-list text-light ms-3"></i>
                                </a>
                              </div>
                             
                              <!--logout-->
                              <div class="dropdown">
                                    <a href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-right-from-bracket text-light ms-3"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                              
                            </div>

                         
                          </div>
                      </div>  
                    </div>
                  </nav>
            </div>
        </div>
       
        <div class="row search_result">
            <div class="col-md-12 p-0">
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
              <div class="banner">
                <a class="shop" href="shop.php">Shop now</a>
                <div class="summer-sales text-light text-uppercase fs-1 fw-bold">
                  <p>Summer fall 2024</p>
                </div>
               
              </div>
            </div>
        </div>

          <div class="row no-gutters px-0">
            <div class="col-md-12 px-4 py-4 text-uppercase">
               <h2 class="fs-2">Summer wears</h2>
            </div>
            <?php
              foreach($products as $product){
              if ($product["products_id"] >= 1 && $product["products_id"] <= 4) {
            ?>
            <div class="col-md-3 px-0">
              <div class="femalepro">
                <a href="product_detail.php?id=<?php echo $product["products_id"]?>">
                <img src="uploads/<?php echo $product["products_image"]?>" alt="a woman" class="img-fluid"></a>
                <button class="add-to-cart-btn cartbtn fw-bold text-center" value="<?php echo $product["products_id"]?>">Add to cart</button>
                 <a href="product_detail.php?id=<?php echo $product["products_id"]?>">
                <span class="ms-3 text-dark mt-5"><?php echo $product["products_name"]?>
                </span></a> 
                 <small><span class="pb-1 d-block ps-3" style="padding-top: 5px;">&#8358;<?php echo $product["products_price"]?></span></small>
              </div>
            </div>
            <?php
              }
            } 
            ?>

          <div class="row px-0 ms-0">
            <div class="col-md px-0">
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/model1.jpg"  class="img-fluid" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/model2.jpg" class="img-fluid" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/model3.jpg" class="img-fluid" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
           
          </div>
        <div class="row">
          <div class="col">
            <div class="text-uppercase py-4 px-4">
              <h2 class="fs-2 popular">Popular</h2>
            </div>
          </div>
        </div>

        <div class="row px-0 ms-0">
          <?php
            foreach($products as $product){
            if ($product["products_id"] >= 5 && $product["products_id"] <= 8) {
          ?>
           <div class="col-md-3 px-0">
            <div class="mens-popular">
            <a href="product_detail.php?id=<?php echo $product["products_id"]?>">
                <img src="uploads/<?php echo $product["products_image"]?>" class="img-fluid" alt="a woman"></a>
                <button class="add-to-cart-btn cartbtn fw-bold text-center" value="<?php echo $product["products_id"]?>">Add to cart</button>
                 <a href="product_detail.php?id=<?php echo $product["products_id"]?>">
                <span class="ms-3 text-dark"><?php echo $product["products_name"]?>
                </span></a> 
                 <small><span class="pb-1 d-block ps-3" style="padding-top: 5px;"> &#8358;<?php echo $product["products_price"]?></span></small>
               
            </div>
          </div>
        <?php
          }
        } 
        ?>
      </div>

        <div class="row">
          <div class="col-md-6 px-0 change">
            <div class="third-banner">
              <img src="images/third-banner.jpg" alt="">
            </div>
          </div>

          <div class="col-md-3 px-2">
              <div class="display">
                <img src="images/lady1.jpg" alt="a woman">
                <img src="images/lady2.jpg" alt="a woman">
                <img src="images/man.jpg" style="height:60;" alt="a woman">
              </div>
          </div>

          <div class="col-md-3 d-flex justify-content-center align-items-center" style="height:65vh;">
            <div class="shopall">
              <a href="shop.php">Shop All</a>
            </div>
          </div>
        </div>

        <div class="row px-0 ms-0">
          <div class="col-md-12 px-0">
            <div class="fourth-banner px-0">
              <img src="images/fourth-banner.jpg" alt="Banner Image">
            </div>
        </div>
      </div>

      <div class="row footer px-5 ms-0">
        <div class="col-md-4">
          <h6 class="text-uppercase pb-1">Newsletter</h6>
          <p class="pb-2">Sign up to our newsletter to recieve exclusive offers and update</p>
          <form action="" method="post">
            <div>
              <input type="email" placeholder="Email" name="email" class="form-control py-2">
            </div>
            <div class="mt-3 mb-0">
              <button type="submit" class="btn btn-primary">Subscribe</button>
            </div> 
          </form>
        </div>

        <div class="col-md-3 newsletter">
          <h6 class="text-uppercase footer-text">Company</h6>
          <div class="footer-links">
            <ul class="ul-list list-unstyled">
              <li><a href="#"></a>About Us</li>
              <li><a href="#"></a>Careers</li>
            </ul>
          </div>
        </div>

        <div class="col-md-3">
        <h6 class="text-uppercase footer-text">Help</h6>
          <div class="footer-links">
            <ul class="ul-list list-unstyled">
              <li><a href="#"></a>Contact</li>
              <li class="text-uppercase"><a href="#"></a>Faq</li>
              <li><a href="#"></a>Shipping</li>
              <li><a href="#"></a>Returns</li>
            </ul>
          </div>
        </div>

          <div class="col-md-2">
            <h6 class="text-uppercase footer-text">Socials</h6>
            <div class="social-media">
              <a href="#"><i class="fa-brands fa-facebook text-light p-1"></i></a>
              <a href="#"><i class="fa-brands fa-twitter text-light p-1"></i></a>
              <a href="#"><i class="fa-brands fa-instagram text-light p-1"></i></a>
              <a href="#"><i class="fa-brands fa-pinterest-p text-light p-1"></i></a>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pt-5">
              <i class="fa-brands fa-cc-amex p-1" style="color: #fdfcff;"></i>
              <i class="fa-brands fa-cc-apple-pay p-1" style="color: #fdfcff;"></i>
              <i class="fa-brands fa-cc-mastercard p-1" style="color: #fdfcff;"></i>
              <i class="fa-brands fa-cc-visa text-li p-1" style="color: #fdfcff;"></i>
              <i class="fa-brands fa-google-pay bg-light text-dark"></i>

            </div>

            <div class="col-md-6 d-flex pt-5">
              <p class="copyright"> &copy; 2024. Unruly</p>
              <p class="policy ms-3">Private</p>
              <p class="terms mx-3">Terms</p>
              <p class="info">Do not sell my personal information</p>
            </div>

            <!-- <div class="col"> -->
              
            </div>
          </div>
        </div>
     </div>

    <!--offcanvas cart -->
    <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasCart"
    aria-labelledby="offcanvasCartLabel"
  >
    <div class="offcanvas-header">
      <h3 class="offcanvas-title" id="offcanvasExampleLabel">Your Cart</h3>
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body">
      <div class="row">
        <div class="col-12 text-center mb-2">
        <?php
            if (isset($items)) {
                $total = 0;
                foreach ($items as $key => $value) { // key is the product id, value is the quantity
                    $product = $pro->fetch_product_by_id($key);
                    $ptotal = $product['products_price'] * $value;
                    $total += $ptotal;
            ?>
                    <div class="cart-item row mb-3">
                        <!-- Product Image -->
                        <div class="col-md-3">
                            <img src="uploads/<?php echo $product['products_image']; ?>" alt="Product Image" class="img-thumbnail">
                        </div>

                        <!-- Product Details: Name and Price -->
                        <div class="col-md-6">
                            <p class="mb-1 fw-bold text-start"><?php echo $product['products_name']; ?></p>
                            <p class="mb-0 text-muted text-start">$<?php echo $product['products_price']; ?></p>
                            <input type="number" class="form-control text-center w-50 mt-2" value="<?php echo $value; ?>" min="1">
                        </div>

                        <!-- Quantity Input and Trash Icon -->
                        <div class="col-md-3 d-flex align-items-center justify-content-end">
                            <a href="emptycart.php?id=<?php echo $product['products_id']?>" class="text-dark"><i class="fa-solid fa-trash"></i></a>
                        </div>

                    </div>
              <?php
                }   
            } else {
                  echo "<div class='d-flex justify-content-center align-items-center' style='height: 70vh;'>
                  <p>No items in the cart.</p>
                      </div>";
            }
            ?>
        </div>
    </div>
        </div>
        <div class="col-md-12 text-center">
        <a class="btn btn-dark col-12 mb-2" href="index.php" name="btnshop">
            Continue shopping
          </a>
          <a class="btn btn-dark col-md-12 mb-3" href="shopping_cart.php" name="btnshop">
            Proceed to checkout
          </a>
        </div>
      </div>
    </div>    
  </div>


  <script src="jquery-3.7.1.min.js"></script>
  <script src="custom.js"></script>  
  <script
      src="bootstrap/js/bootstrap.bundle.js"
      type="text/javascript"
    ></script>
</body>
</html>

