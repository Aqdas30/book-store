<?php
include "connection.php";
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$username=$_POST["username"];
$password=$_POST["password"];
$sql ="SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);
if ($user) {
if ($password== $user["password"]) {
 session_start();
$_SESSION["user_id"] = $user["userid"];
$_SESSION["user_name"] = $user["username"];
$_SESSION["user_type"] = $user["usertypeid"];
if($user["usertypeid"]==1)
{
    header("Location: admin.php");

}
else
{
    header("Location: index.php");

}

exit;
}
}
$is_invalid = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href='https://fonts.googleapis.com/css?family=Spartan'
rel='stylesheet'>
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
rel="stylesheet">
<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
crossorigin="anonymous">
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js
" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
<link rel="stylesheet"
href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script
src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
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
<?php if ($is_invalid): ?>
<em>Invalid login</em>
<?php endif; ?>
<form class="login-form" method="POST" action="<?php echo
htmlentities($_SERVER['PHP_SELF']); ?>">
<div class="login-form__logo-container">
<img class="login-form__logo" src="images/logo5.png" alt="Logo">
</div>
<div class="login-form__content">
<div class="login-form__header">Login to your account</div>
<input class="login-form__input" type="text"
placeholder="Username" name="username">
<input class="login-form__input"
type="password" placeholder="Password" name="password">
<br>
<br>
<button class="login-form__button" type="submit"
name="login">Login</button>
<div class="login-form__links">
<a class="login-form__link" href="">Forgot your password</a>
<button class="account-not"><a href="signUp.php">Dont Have 
Account</a></button>
</div>
</div>
</form>
</body>
</html>