<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://fonts.googleapis.com/css?family=Spartan' rel='stylesheet'>
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
          body{
        background-color: rgb(90, 120, 136);
        margin: 15px;
        margin-top: 50px;
        opacity: 0.5px;
    }
    </style>
</head>
<body>
    <style><?php include "style.css";?></style>
<?php
include "connection.php";

if(isset($_POST['sub_btn']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $usertypeid=$_POST['usertypeid'];

    if(empty($username))
    {
        $error=" Username field is Required";
    }
    else if(empty($email))
    {
        $error=" Email field is Required";
    }
    else if(empty($password))
    {
        $error=" Password field is Required";
    }
    else if(empty($confirm_password) || ($password!=$confirm_password))
    {
        $error=" Password Does not Match";
    }
    else if(strlen($username)<5 || strlen($username)>30)
    {
        $error= "Username Must be Between 5 to 30 characters long";
    }
    else if(strlen($password)<6)
    {
        $error= "Password Must be atleast 6 characters";
    }
    else{
        $check="SELECT * from `user` where  email='$email' || username='$username'";
        $data=mysqli_query($conn,$check);
        $result=mysqli_fetch_array($data);
        if($result>0)
        {
            $error="Email Already Exist";
        }
        else
        {
            $insert="INSERT into `user` (fname,lname,username,email,password,usertypeid)

            values('$fname','$lname','$username','$email','$password',$usertypeid)";
            $insert_result=mysqli_query($conn,$insert);
            if($insert_result)
            {
                $success="Your Account has been Created";
            }
        }

    }
}

?>

        <form class="login-form" action="" method="POST">
            
            <div class="login-form__logo-container">
                <img class="login-form__logo" src="images/logo5.png" alt="Logo">
            </div>
             <div class="login-form__content">
                <div class="login-form__header">Register User</div>

                <div style="color: red; font-size:15px;">
                <?php
                if(isset($error))
                {
                    echo $error;
                }
                
                ?>
            </div>
            <div style="color: green; font-size:15px ">
                <?php
                if(isset($success))
                {
                    echo $success;
                }
                
                ?>
            </div>
                <input class="login-form__input" type="text"  placeholder="Fist name" name="fname"
                value="<?php if(isset($error)){echo $fname;} ?>" autocomplete="off">
                <input class="login-form__input" type="text"  placeholder="Last name" name="lname"
                value="<?php if(isset($error)){echo $lname;} ?>">
                <input class="login-form__input" type="text"  placeholder="user name" name="username" value="<?php if(isset($error)){echo $username;} ?>">
                <input class="login-form__input" type="text"  placeholder="Email" name="email" value="<?php if(isset($error)){echo $email;} ?>">
                <select class="login-form__input"name="usertypeid">
         <option value="2">user</option>
         <option value="1">admin</option>
      </select>
                <input class="login-form__input" type="password"  placeholder="Password" name="password">
                <input class="login-form__input" type="password"  placeholder="Confirm Password" name="confirm_password">
                <button class="login-form__button" type="submit" name="sub_btn">Register</button>
                 <button class="login-form__button"><a href='login.php' class="loginlink">login</a></button>

                


               
            </div>
        </form>
</body>
</html>