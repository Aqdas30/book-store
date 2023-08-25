<?php
include "connection.php";
$f="SELECT * From `book` join `bookcategories` on book.categoryid=bookcategories.categoryid limit 10";
$stmt=mysqli_prepare($conn,$f);
$stmt->execute();
$featured_products=$stmt->get_result();

?>
