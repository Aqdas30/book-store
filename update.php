<?php
include 'connection.php';
 $id=$_GET['bookid'];
 $select=" SELECT * From `book` join `bookcategories` on book.categoryid=bookcategories.categoryid join
 `booklanguage` on book.languageid=booklanguage.languageid join `author` on book.authorid=author.authorid where bookid='$id'";
 $data=mysqli_query($conn,$select);
 $row=mysqli_fetch_array($data);
 
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   <?php  include 'style.css';?>

</style>
</head>
<body>
    

<div>
        <form action="" method="POST">
            <input value="<?php echo $row['bookname'] ?>" type="text" name="bname" placeholder="book name...."><br><br>
            <select name="category" id="author">
  <option value="1">Fiction</option>
  <option value="2">Horror</option>
  <option value="3">Romance</option>
  <option value="4">Fantasy</option>
  <option value="5">Poetry</option>
  <option value="6">Thrill</option>
  <option value="7">Drama</option>

</select>             
<select name="lang" id="lang">
  <option value="1">English</option>
  <option value="2">Urdu</option>
</select>  
 <select name="author" id="author">
  <option value="1">William Shakespeare</option>
  <option value="2">Colleen Hoover</option>
  <option value="3">E.Nesbit</option>
  <option value="4">Holly Black</option>
  <option value="5">Jenny Ham</option>
  <option value="6">Lynda Rutlebge</option>
  <option value="7">Courtney Pippernell</option>
  <option value="8">Michael faber</option>
  <option value="9">Pierre Alex</option>
  <option value="10">Tillie Cole</option>
  <option value="11">Roni Loren</option>
  <option value="12">John Green</option>
  <option value="13">Lisa Jewell</option>
  <option value="14">Caron M.Macmanus</option>
  <option value="15">Sidney Sheldon</option>
  <option value="16">Kelly Bernhenn</option>
  <option value="17">Pike</option>
  <option value="18">Viginia Andrews</option>

</select>              <input value="<?php echo $row['price'] ?>"type="text" name="price" placeholder="price...."><br><br>
            <input value="<?php echo $row['discription'] ?>"type="text" name="desc" placeholder="Description...."><br><br>
            <input value="<?php echo $row['quantity'] ?>"type="number" name="quantity" placeholder="quantity...."><br><br>

            <input value="<?php echo $row['ISBN'] ?>"type="text" name="isbn" placeholder="isbn...."><br><br>

            
            
            
            
            
            
            <input type="submit" name="update_btn" value="Update">
            <button><a href="view.php">Back</a></button>


        </form>
    </div>
    <?php
    if(isset($_POST['update_btn']))
    {
        $bname=$_POST['bname'];
        $lang=$_POST['lang'];
        $author=$_POST['author'];
        $category=$_POST['category'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $isbn=$_POST['isbn'];
        $stock=$_POST['quantity'];
        $update="UPDATE  book SET bookname='$bname',categoryid='$category',languageid='$lang',
        authorid='$author',price='$price',discription='$desc',quantity='$stock',ISBN='$isbn' where bookid='$id'
        ";
        $data=mysqli_query($conn,$update);
if($data)
{
    echo "Updated Succesfully";
}
else{
    echo "Update failed";

}

    }
    ?>
    
</body>
</html>