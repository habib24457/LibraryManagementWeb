<?php
include ('connection.php');


session_start();

if (isset($_POST['login'])) {
$user = $_POST['u'];
$p = $_POST['p'];

$que = "SELECT *FROM adminLogin WHERE user='$user' and pass='$p' ";

$res = mysqli_query($conn,$que) or die(mysqli_error($conn));
$count = mysqli_num_rows($res);
if ($count == 1) {
  $_SESSION['user']=$user;
  echo "LOGGED IN";
  header("location:adminHome.php");
  }
  else{
    echo '<script language="javascript">';
    echo 'alert("Unknown Username/Password")';
    echo '</script>';
}
}
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Admin Login</title>
  </head>


  <body style="background:#0d498ddc;">
<nav class="navbar ">
  <a class="navbar-brand" href="#" style="color:#ffffff">
    
    Admin Panel
  </a>
</nav>



    <div class="container-fluid">

<div class="row justify-content-center">
  <div class="col-12 col-sm-6 col-md-3 reg">

<form action="adminLogin.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="u" required>
    
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" name="p" required>
  </div>
  
  <button type="submit" class="btn btn-primary" name="login">Submit</button>
</form>

  <a href="adminReg.php">new?Register now</a>
  <br>
  <a href="firstPage.html">Go back to Home</a>


    
  </div> <!--end of colmn-->

  
</div> <!--end of row-->

    






















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>