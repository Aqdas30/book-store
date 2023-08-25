<?php

$servername="localhost";
$username="root";
$password="";
$dbname="oneri";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "connection error";
}
// session_start();

?>