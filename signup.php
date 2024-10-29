<?php
  session_start();
  require_once "classes/Product.php";
  $pro = new Product();

  if(isset($_SESSION['cartitems'])){
    $item_count = count($_SESSION['cartitems']);
    $items = $_SESSION['cartitems'];
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css_all/all.css" />
    <link rel="icon" type="image/jpg" sizes="32x32" href="partials/logo.jpg">
    <title>Document</title>
    <style>
      .error {
        color: red;
      }

      .success {
        color: green;
      }

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: #f5f5f5;
}

/*navbar*/
.links {
    gap: 30px;
    margin-right: 360px;
}

.navbar{
  width: 100%;
  position: absolute;
  position: fixed;
  background-color: #f5f5f5 !important;
  color: black !important;
  transition: background-color 0.4s ease;
  z-index: 1;
}

.navbar.bg-scrolled {
    background-color: rgba(0,0,0,0.8) !important;
    transition: background-color 0.4s ease;
}

.navbar a, 
.navbar i,
.navbar .dropdown-toggle,
.navbar .navbar-brand {
    color: #000 !important; /* Black text and icons */
}

.navbar.bg-scrolled a, 
.navbar.bg-scrolled i,
.navbar.bg-scrolled .dropdown-toggle,
.navbar.bg-scrolled .navbar-brand {
    color: #fff !important; 
}

.nav-header {
    font-size: 25px;
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

  .footer {
    background: black;
    height: 70vh;
    color: #f5f5f5;
    padding-top: 80px;
    margin-top: 140px;
  }

  .newsletter {
    padding-left: 100px;
  }

  .copyright, .policy, .terms, .info{
    font-size: 16px;
    color: #f5f5f5; 
  }

    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col px-0">
          <!--navbar-->
          <nav class="navbar navbar-expand-lg bg-dark fixed-top">
            <div class="container-fluid">
              <a
                class="navbar-brand text-uppercase text-light ms-5 fw-bolder nav-header"
                href="index.php"
                >unruly</a
              >
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--links-->
                <div class="col px-0">
                  <div>
                    <ul
                      class="d-flex justify-content-center list-unstyled pt-3 text-light links"
                    >
                      <li><a href="men.php" class="nav-link">Men</li></a>
                      <li><a href="women.php" class="nav-link">Women</li></a>
                      <li><a href="accessories.php" class="text-decoration-none nav-link">Accessories</li></a>
                     <li><a href="shop.php" class="nav-link">Shop</li></a>
                    </ul>
                  </div>
                </div>

                <!--language menu-->
                <div class="col-md-4">
                  <div
                    class="d-flex align-items-center justify-content-end me-5"
                  >
                    <div class="language-dropdown dropdown menu">
                      <span
                        class="language ps-3 fw-normal m-4 text-light dropdown-toggle"
                        id="languageDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        >EN</span
                      >
                      <ul
                        class="dropdown-menu"
                        aria-labelledby="languageDropdown"
                      >
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Francais</a></li>
                        <li><a class="dropdown-item" href="#">Spanish</a></li>
                      </ul>
                    </div>

                    <i class="fa-solid fa-magnifying-glass text-light me-2"></i>
                    <!--dropdown menu-->
                    <div class="dropdown">
                      <a
                        href="#"
                        id="userDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="fa-regular fa-user ms-2 text-light"></i>
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="userDropdown"
                      >
                        <li>
                          <a class="dropdown-item" href="login.php">Login</a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="signup.php"
                            >Sign Up</a
                          >
                        </li>
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
                      >
                        <i class="fa-solid fa-bag-shopping text-light ms-3"></i>
                        <?php
                           if(isset($item_count)){
                         ?>
                           <span class='bg-danger px-1 cartcount text-light' style="border-radius: 80%;"><?php echo $item_count?></span>
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
                    <div>
                    <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket text-light ms-3"></i>
                     </a>
                    </div> 

                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-6 px-0">
          <div class="loginface">
            <img src="images/img.jpg" alt="models" />
          </div>
        </div>

        <div class="col-md-6 login-form-container">
          <div class="col-9 login-info">
            <h2 class="mb-4 fw-bold">Sign Up</h2>
            <form action="process/signup_action.php" method="post">
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
              <div class="mb-4">
                <input
                  type="text"
                  name="fname"
                  id="fname"
                  placeholder="First name*"
                  class="form-control"
                />
              </div>
              <div class="mb-4">
                <input
                  type="text"
                  name="lname"
                  id="lname"
                  placeholder="Last name*"
                  class="form-control"
                />
              </div>
              <div class="login-details">
                <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Email address*"
                  class="form-control"
                />
              </div>
              <div class="mt-4 mb-3">
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Password*"
                  class="form-control"
                />
              </div>
              <div class="mt-4 mb-3">
                <input
                  type="password"
                  name="con_password"
                  id="password"
                  placeholder="Confirm password*"
                  class="form-control"
                />
              </div>
              <div class="mt-4">
                <button
                  type="submit"
                  id="signbtn"
                  class="btn btn-dark col-12" disabled
                  name="btnsubmit"  
                  value="1"
                  
                >
                  Sign Up
                </button>
              </div>
              <div class="mt-4">
                <p class="text-center text-dark">
                  Already have an account?
                  <a href="login.php" class="text-dark">Sign in here</a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="row footer px-5">
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
          <div class="col text-center mb-2">
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
                        <div class="col-3">
                            <img src="uploads/<?php echo $product['products_image']; ?>" alt="Product Image" class="img-thumbnail">
                        </div>

                        <!-- Product Details: Name and Price -->
                        <div class="col-6">
                            <p class="mb-1 fw-bold text-start"><?php echo $product['products_name']; ?></p>
                            <p class="mb-0 text-muted text-start">$<?php echo $product['products_price']; ?></p>
                            <input type="number" class="form-control text-center w-50 mt-2" value="<?php echo $value; ?>" min="1">
                        </div>

                        <!-- Quantity Input and Trash Icon -->
                        <div class="col-3 d-flex align-items-center justify-content-end">
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
          <div class="col-12 text-center">
            <a class="btn btn-dark col-12 mb-2" href="index.php" name="btnshop">
              Continue shopping
            </a>
            <a class="btn btn-dark col-12 mb-3" href="shopping_cart.php" name="btnshop">
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
