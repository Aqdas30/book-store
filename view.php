<?php
include 'connection.php';
?>
<table border='1px' cellpadding="10" cellspacing="0"> 
    <tr>
    <th>Book Id</th>
      <th>Book Name</th>
        <th>Category</th>
        <th>Language</th>
        <th>Author</th>
        <th>Price</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>ISBN</th>

        <th colspan='2'>Action </th>


    </tr>
    <?php
    $query= "SELECT * From `book` join `bookcategories` on book.categoryid=bookcategories.categoryid join
    `booklanguage` on book.languageid=booklanguage.languageid join `author` on book.authorid=author.authorid 
    order by bookid ";
    $data=mysqli_query($conn,$query);
    $result=mysqli_num_rows($data);
    if($result)
    {
        while($row=mysqli_fetch_array($data))
        {
            ?>
            <tr>
            <td><?php 
                echo $row['bookid'];
                ?></td>
                <td><?php 
                echo $row['bookname'];
                ?></td>
                <td><?php 
                echo $row['categoryname'];
                ?></td>
                <td><?php 
                echo $row['languagename'];
                ?></td>
                <td><?php 
                echo $row['authorname'];
                ?></td>
                <td><?php 
                echo $row['price'];
                ?></td>
                <td><?php 
                echo $row['discription'];
                ?></td>
                <td><?php 
                echo $row['quantity'];
                ?></td>
                <td><?php 
                echo $row['ISBN'];
                ?></td>
                <td>
                    <a href="update.php?bookid=<?php echo $row['bookid'];?>">EDIT</a>
                </td>
                <td>
                    <a onclick=" return confirm('Are You Sure,You Want to Delete?')"href="delete.php?bookid=<?php echo $row['bookid'];?>">Delete</a>
                </td>
            </tr>
            <?php
            
        }
    }
    
    else
    {
        ?>
       
        <tr>
            <td>NO RECORD FOUND</td>
        </tr>
        <?php
    }
    ?>
</table>