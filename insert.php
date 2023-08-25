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
    <style>
     <?php include 'style.css'; ?>
    </style>
</head>
<body>
<section class="section-p1" class="section-m1">
        
        <div>
            <form action="" method="POST" name="bookdetail" onsubmit="return validateForm()">
    <fieldset>
    <legend><b>ADD A BOOK</b></legend> 
    
        <label  id="bname" for="bookname">Book Name:</label>          
        <input type="text"  name="bname" placeholder="Book name"><br><br>
        <label  id="lang" for="lang">Language: </label>          

            <select name="lang" id="lang">
  <option value="1">English</option>
  <option value="2">Urdu</option>
</select>  
<br><br>
<label  id="author" for="author">Author:</label>          

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

</select>  
<br><br>
<label id="category" for="category">Category:</label>          

<select name="category" id="author">
  <option value="1">Fiction</option>
  <option value="2">Horror</option>
  <option value="3">Romance</option>
  <option value="4">Fantasy</option>
  <option value="5">Poetry</option>
  <option value="6">Thrill</option>
  <option value="7">Drama</option>

</select> 
<br><br>
<label id="isbn" for="isbn">ISBN No:</label>          

<input type="text" name="isbn" placeholder="ISBN NO" ><br><br>
<label id="stock"for="stock">Stock:</label>          

<input type="number" name="stock" placeholder="Stock "><br><br>
<label id="price" for="price">Price </label>          

<input type="text" name="price" placeholder="Price "><br><br>
<label id="pic"for="pic">Picture</label>          

<input type="file" name="pic" placeholder="Picture "><br><br>
<label id="dec"for="desc">Description:</label>          

 <textarea name="desc" placeholder="Description" rows="4" cols="50"></textarea><br><br>

            <input type="submit" id="button" name="sub_btn" value="Save">
            <button><a href="view.php">View</a></button>


        </form>
    </div>
    </section>
    </fieldset>
    <?php
    if(isset($_POST['sub_btn']))
    {
        $bname=$_POST['bname'];
        $lang=$_POST['lang'];
        $author=$_POST['author'];
        $category=$_POST['category'];
        $price=$_POST['price'];
        $desc=$_POST['desc'];
        $isbn=$_POST['isbn'];
        $stock=$_POST['stock'];
        $images=$_POST['pic'];

        $query="INSERT INTO `book` (`bookname`, `categoryid`, `languageid`, `authorid`, `images`, `price`, `discription`, `quantity`, `ISBN`) VALUES ('$bname', '$category', '$lang', '$author', '$images', '$price', '$desc', '$stock', '$isbn')";
        $data=mysqli_query($conn,$query);
if($data)
{
    echo "Data Inserted Succesfully";
}
else{
    echo "Data Insertion failed";

}

    }
    ?>
    <script>
        function validateForm() {
  let x = document.forms["bookdetail"]["isbn"].value;
  if (x.length < 9 || x.length >9) {
    alert("ISBN Must be 13 digit long");
    return false;
  }
  let y=document.forms["bookdetail"]["stock"].value;
  if(y<1)
  {alert("Stock must not be negative");
    return false;

  }
}
    </script>
    
</body>
</html>