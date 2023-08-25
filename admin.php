<?php 
include 'connection.php';
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
        <?php 
include 'style.css';
?>

    </style>
</head>
<body>
<?php
       
    ?>

<section id="header">
        <a href="#"><img src="images/logo5.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navBar">
                <li><a href="logout.php"><i class="far fa-user"></i></a></li>
                
            </ul>
        </div>
    </section>
    <section id="product">
        <h2>Dashboard</h2>
    </section>
    <section id="product">
        <h1>Data</h1>
        <button><a href="insert.php">Click to add book</a></button>
        <button><a href="view.php">Click to View book</a></button>

    </section>
    </body>
</html>
