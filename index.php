<?php include "get_featured_products.php";
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Spartan' rel='stylesheet'>
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
       if (!isset($_SESSION["user_name"]))
       {
        header("Location: welcome.php");


       }
       else{
        
       
        

        

    ?>
    <section id="header">
        <a href="#"><img src="images/logo5.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navBar">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="#category">Shop</a></li>
                <li> <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Categories
  </button>
  <ul class="dropdown-menu" >
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=7";?>">Poetry</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=3";?>">Fantasy</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=1";?>">Fiction</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=4";?>">Romance</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=5";?>">Thriller</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=6";?>">Drama</a></li>
    <li><a class="dropdown-item" href="<?php echo "fiction.php?categoryid=2";?>">Horror</a></li>


  </ul>
</div></li>                <li><a href="#About">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <?php  if(isset($_SESSION['user_name']))
                {?>
                <li> <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <?php  echo $_SESSION['user_name']; echo "  ";?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">log out</a></li>
  </ul>
</div></li>

               
                <?php
                }
                else{
                ?>
                <li><a href=""><i class="far fa-user"></i></a></li>
                <?php } ?>
                


            </ul>
        </div>
    </section>
    <section id="box">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/slider_1.jpeg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/slider_2.jpeg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/slider_3.jpeg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        <h2>Welcome To Oneri</h2>
        <h4>Best Selling</h4>
        <h1>Books</h1>
        <p>Discover the Best Books</p>
        <button>Shop Now</button>
    </section>
    <section id="features" class="section-p1">
        <div class="feature-box">
            <img src="images/f2.jpg" alt="book">
            <h6>Free Shipping</h6>
        </div>
        <div class="feature-box">
            <img src="images/f1.jpg" alt="book">
            <h6>Order Online</h6>
        </div>
        <div class="feature-box">
            <img src="images/f3.jpg" alt="book">
            <h6>Save Money</h6>
        </div>
        <div class="feature-box">
            <img src="images/f4.jpg" alt="book">
            <h6>Promotion</h6>
        </div>
        <div class="feature-box">
            <img src="images/f5.jpg" alt="book">
            <h6>Happy Sell</h6>
        </div>
        <div class="feature-box">
            <img src="images/f6.jpg" alt="book">
            <h6>24/7 Support</h6>
        </div>
    </section>
    <section id="product" class="section-p1">
        <h2>Featured Products</h2>
        
        <div class="product-container">
            <?php 
                    while($r=mysqli_fetch_assoc($featured_products)){
                    ?>
                <div class="pro">
                    
                    <img src="images/<?php echo $r['images']; ?>" alt="book">
                    <div class="info">
                        <span><?php echo $r['categoryname'];?></span>
                        <h5><?php echo $r['bookname']; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
    
                        </div>
                        <h4>Rs:<?php echo $r['price']; ?></h4>
                    </div>
                    <a href="<?php echo "single_Product.php?bookid=". $r['bookid'];?>"><i class="fal fa-shopping-cart cart" name="cart_btn"></i></a>
                </div>
                <?php }
                 ?>
            <!-- </a>  -->
        </div>
       
    </section>
    <section id="banner" class="section-m1">
        <h2>Serving <span>Book Lovers</span> Since 1999</h2>
        <button class="normal" ><a href="#category">.</a>Explore More</button>
    </section>
   

    <section id="product" class="section-p1" >
        <h2  id="About">About Us</h2>
        <div class="Aboutbox" >
            <div class="About1">
                <h1>Welcome To Our Website<br> A book space or platform to help you<br> Master in reading</h1>
            </div>
            <div class="About1">
                <img src="images/3.jpg">
            </div>

        </div>
        <div class="Aboutbox">
            <div class="About2">
                <img src="images/2.jpg">
            </div>
            <div class="About2 about2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae quam, temporibus unde reprehenderit corrupti accusantium a ab enim quidem quos recusandae eligendi hic voluptates nisi autem libero, excepturi molestias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae quam, temporibus unde reprehenderit corrupti accusantium a ab enim quidem quos recusandae eligendi hic voluptates nisi autem libero, excepturi molestias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae quam, temporibus unde reprehenderit corrupti accusantium a ab enim quidem quos recusandae eligendi hic voluptates nisi autem libero, excepturi molestias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae quam, temporibus unde reprehenderit corrupti accusantium a ab enim quidem quos recusandae eligendi hic voluptates nisi autem libero, excepturi molestias.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, molestiae quam, temporibus unde reprehenderit corrupti accusantium a ab enim quidem quos recusandae eligendi hic voluptates nisi autem libero, excepturi molestias.</p>

                

            </div>
            <div class="About2">
                <h1>About us</h1>
            </div>

        </div>
    </section>

    <footer class="section-p1" style="background-color: rgb(196, 208, 208);">
        <div class="col">
            <img class="logo" src="images/logo5.png">
            <h4>Contact</h4>
            <p><strong>Address: </strong> 562 Main Road,Street 32, Lahore</p>
            <p><strong>Phone: </strong> +923220461132, +923034083231</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>

                </div>
            </div>

        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms and Conditions</a>
            <a href="#">Contact Us</a>

        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track my Order</a>
            <a href="#">Help</a>

        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Playstore</p>
            <div class="row">
                <img src="images/app.jpg">
                <img src="images/play.jpg">

            </div>
            <p>Secure Payment Gateways</p>
            <img src="images/pay.png">

        </div>
        <div class="copyright">
            <p>2023,Oneri All Rights are Reserved</p>
        </div>
          
    </footer>
   
    
    <script>
        
    </script>
   

    <script src="script.js"></script>
    <?php
    
       }
        
    
    ?>
</body>

</html>

                