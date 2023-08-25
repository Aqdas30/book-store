<?php 
include "connection.php";
$book=" ";
if(isset($_GET['bookid']))
{
    $bookId=$_GET['bookid'];
    $stmt=$conn->prepare("SELECT * From `book` where bookid =? ");
    $stmt->bind_param("i",$bookId);
    $stmt->execute();
    $book = $stmt->get_result();
}
else{
header('location: index.php');
}
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
    <script src="script.js"></script>

    <link rel="stylesheet" href="style.css">
    <style>
        body{
            background-color: white;
        }
    </style>
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo5.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navBar">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href=".Aboutbox">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    </section>
    <section class=" container single-product" >
        <div class="row mt-5">
            <?php 
            while($row = $book->fetch_assoc())
             {
                ?>
                
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1"src="images/<?php echo $row['images']; ?>" alt="book" id="main-img">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="images/<?php echo $row['images']; ?>" alt="book" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $row['images']; ?>" alt="book" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $row['images']; ?>" alt="book" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/<?php echo $row['images']; ?>" alt="book" width="100%" class="small-img">
                    </div>
                </div>
            </div>
          
            <div class="col-lg-6 col-md-12 col-12">
                <h6>Book</h6>
                <h3 class="py-2"><?php echo $row['bookname']; ?></h3>
                <h4>Rs: <?php echo $row['price']; ?></h4>
                <form action="cart.php" method="POST">
                <input type="hidden" name="bookid" value="<?php echo $row['bookid']; ?>">

                    <input type="hidden" name="images" value="<?php echo $row['images']; ?>">
                    <input type="hidden" name="bookname" value="<?php echo $row['bookname']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <input type="number" name="quantity" value="1">
                    <button class="buy-btn" type="submit" name="addtocart">Add to Cart</button>

                    </form>



               
                <h4 class="mt-4">About This Book</h4>

                <p><?php echo $row['discription']; ?></p>
            </div>
            <?php  }?>
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
    var img= document.getElementById("main-img");
var smallImg=document.getElementsByClassName("small-img");
var tempImg;
for(let i=0;i<4;i++){
smallImg[i].onclick=function(){
    tempImg=img.src;
    img.src=smallImg[i].src;
    smallImg[i].src=tempImg;
}}


    </script>

</body>
</html>