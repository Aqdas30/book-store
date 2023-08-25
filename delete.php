<?php
include 'connection.php';
$id=$_GET['bookid'];

$query=" DELETE from book where bookid='$id'";
$data=mysqli_query($conn,$query);
if($data)
{
    echo "Data Deleted";
}
else{
    echo "Data Deletion Error";

}
?>
<button><a href="view.php">Back</a></button>