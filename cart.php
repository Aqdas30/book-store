<?php
include "connection.php";


session_start();
if(isset($_POST['addtocart']))
{
    if(isset($_SESSION['cart']))
    {
        $bookarray_ids=array_column($_SESSION['cart'],'bookid');
        if(!in_array($_POST['bookid'],$bookarray_ids))
        {
        $bookid=$_POST['bookid'];
        $bookname=$_POST['bookname'];
        $price=$_POST['price'];
        $images=$_POST['images'];
        $quantity=$_POST['quantity'];
        $array=array(
            'bookid'=>$bookid,
            'bookname'=>$bookname,
            'price'=>$price,
            'images'=>$images,
            'quantity'=>$quantity
        );
        $_SESSION['cart'][$bookid]=$array;
    }
    else
    {
        echo '<script>alert("Product Was Already Added")</script>';
    }
    }
    else
{
    $bookid=$_POST['bookid'];
    $bookname=$_POST['bookname'];
    $price=$_POST['price'];
    $images=$_POST['images'];
    $quantity=$_POST['quantity'];
    $array=array(
        'bookid'=>$bookid,
        'bookname'=>$bookname,
        'price'=>$price,
        'images'=>$images,
        'quantity'=>$quantity
    );
    $_SESSION['cart'][$bookid]=$array;

    calculateTotal();
}
}
else if(isset($_POST['removebook']))
{
    $bookid=$_POST['bookid'];
    unset($_SESSION['cart'][$bookid]);
    calculateTotal();

}
else if(isset($_POST['edit_quantity']))
{
    $bookid=$_POST['bookid'];
    $quantity=$_POST['quantity'];
    $book_array=$_SESSION['cart'][$bookid];
    $book_array['quantity']=$quantity;
    $_SESSION['cart'][$bookid]=$book_array;
    calculateTotal();



}

else{
    header('location:index.php');
}

function calculateTotal()
{
    $total=0;
    foreach($_SESSION['cart'] as $key=>$value)
    {
        $book=$_SESSION['cart'][$key];
        $price=$book['price'];
        $quantity=$book['quantity'];
        $total= $total+($price*$quantity);
    }
    $_SESSION['total']= $total;
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
    <link rel="stylesheet" href="style.css">
    <style>

        body{background-color:white;}
    </style>
</head>

<body>
<section id="header">
        <a href="#"><img src="images/logo5.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navBar">
                <li><a href="index.html" >Home</a></li>
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
                <li><a href="cart.php" class="active"><i class="far fa-shopping-bag"></i></a></li>
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
    <section class="cart container my-2 py-2">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>SubTotal</th>
            </tr>
            <?php foreach($_SESSION['cart'] as $key=> $value){ ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="images/<?php echo $value['images'];?>">
                        <div>
                            <p><?php echo $value['bookname'];?></p>
                            <small><span><?php echo $value['price'];?></span></small>
                            <br>
                            <form action="cart.php" method="post">
                            <input type="hidden" name="bookid" value="<?php echo $value['bookid'];?>">
                            <input type="submit" name="removebook" class="remove-btn" value="Remove">

                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="bookid" value="<?php echo $value['bookid'];?>">
                        <input type="number" name="quantity" value="<?php echo $value['quantity'];?>">

<input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                    </form>
                </td>
                <td><span>Rs</span>
                <span class="product-price"><?php echo $value['quantity']*$value['price'];?></span></td>
            </tr>
           <?php } ?>
        </table>
        <div class="cart-total">
            <table>
        <tr>
            <td>Total Amount</td>
            <td>Rs <?php echo $_SESSION['total'];?></td>
        </tr></table>
        </div>
        <div class="checkout-container">
            <form action="checkout.php" method="post">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">

            </form>
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
   

    <script src="script.js"></script>
</body>
</html>