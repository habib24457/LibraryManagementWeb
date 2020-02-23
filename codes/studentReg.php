
<?php

include 'connection.php';

if (isset($_POST['signUp'])) {

$Name = $_POST['name'];
$ID = $_POST['stid'];
$E = $_POST['email'];
$Pass = $_POST['pass'];

$sql = "INSERT INTO studentLogin (user,studentid,email,pass) VALUES ('$Name','$ID','$E','$Pass')";
mysqli_query($conn,$sql);

echo "Sign up successful!";
header("location:studentReg.php");

}



?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Student Register</title>
  </head>







  <body style="background:#0d498ddc;">
    

<nav class="navbar ">
  <a class="navbar-brand" href="#" style="color:#ffffff">
    
    Welcome to Library
  </a>
</nav>




<div class="container-fluid">
  <div class="row justify-content-center">
  <div class="col-md-3 reg">


<form action="studentReg.php" method="POST">
  

  <div class="form-group">
  <label>Name :</label>
  <input type="text" name="name" id="name" class="form-control" required>
  

  
  <label>Student Id :</label>
  <input type="text" name="stid" id="stid" class="form-control" required>
 

  
  <label>Email:</label>
  <input type="text" name="email" id="email" class="form-control" required>
  

 
  <label>Password :</label>
  <input type="Password" name="pass" id="pass" class="form-control" required>


  </div>


   <button type="submit" class="btn btn-primary" name="signUp">Sign Up</button>
  <br>
   <a href="firstPage.html">Go back to Home</a>

</form> <!--form ends here-->

  </div> <!--end of column-->
</div><!--end of row-->
  </div> <!--end of container-->























    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>