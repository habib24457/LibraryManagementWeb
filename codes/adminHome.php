<?php
session_start();
include 'connection.php';

if($_SESSION['user']== true){
  echo("");
}
else{
  header('location:adminLogin.php');
}


if(isset($_POST['logout'])){
session_destroy();
header('location:adminLogin.php');
}




if (isset($_POST['save'])) {
$Serial = $_POST['serial'];
$Name = $_POST['bname'];
$Author = $_POST['author'];
$Edition = $_POST['ed'];
$Col = $_POST['col'];
$Row = $_POST['r'];

$sql = "INSERT INTO books (serial,name,author,edition,col,r) VALUES ('$Serial','$Name','$Author','$Edition','$Col','$Row')";
mysqli_query($conn,$sql);
header("location:adminHome.php");

}

if(isset($_POST['update'])){

$Serial = $_POST['serial'];
$Name = $_POST['bname'];
$Author = $_POST['author'];
$Edition = $_POST['ed'];
$Col = $_POST['col'];
$Row = $_POST['r'];
  
  $sql1 = "UPDATE books SET serial = '$Serial', name = '$Name' , author = '$Author' , edition = '$Edition' , col = '$Col' , r = '$Row'  WHERE serial = '$Serial' ";
  mysqli_query($conn,$sql1);
  header("location:adminHome.php");
}

if(isset($_POST['refresh'])){
  
  header("location:adminHome.php");
}

if(isset($_POST['home'])){
  
  header("location:firstPage.html");
}

if(isset($_POST['delete'])){
$Serial = $_POST['serial'];

$sql2 = "DELETE FROM books where serial ='$Serial' ";
mysqli_query($conn,$sql2);
  
  header("location:adminHome.php");

}





//borrowing..

if(isset($_POST['borrow'])){

$sid = $_POST['id'];
$b = $_POST['book'];
$d = $_POST['date'];


$que1 = "SELECT *FROM borrow WHERE sid='$sid' ";

$res1 = mysqli_query($conn,$que1) or die(mysqli_error($conn));

$count = mysqli_num_rows($res1);

if ($count == 1) {
  echo '<script language="javascript">';
    echo 'alert("Already borrowed once")';
    echo '</script>';
}
else{

  $sql3 = "INSERT INTO borrow (sid,book,date) VALUES ('$sid','$b','$d')";
      mysqli_query($conn,$sql3);

      header("location:adminHome.php");

}

}

if(isset($_POST['return'])){
  $sid = $_POST['id'];
  
  $sql4 = "DELETE FROM borrow where sid ='$sid' ";
  mysqli_query($conn,$sql4);
    
    header("location:adminHome.php");
  
  }
  

/* 
$sql3 = "SELECT * FROM studentLogin WHERE user ='$sid'";

$result = mysqli_query($conn,$sql3);
$count = mysqli_num_rows($result);

if ($count>0) {
    echo "Student exist";

    $sql4 = "SELECT * FROM books WHERE name ='$b'";
    $result1 = mysqli_query($conn,$sql4);
    $count1 = mysqli_num_rows($result1);
    //for checking if the book exist
    if ($count1>0) {
      echo "book exist";

      $sql5 = "INSERT INTO borrow (sid,book,date) VALUES ('$sid','$b','$d')";
      mysqli_query($conn,$sql5);

      header("location:adminHome.php");
    }
    else{

     echo '<script language="javascript">';
echo 'alert("No book with this name")';

//header("location:adminHome.php");

echo '</script>';
    }

  }  

  else{
     echo '<script language="javascript">';
echo 'alert("No Student with this name")';

    echo '  if (confirm("Ok to refresh the page")) {';
    echo '    document.location = adminHome.php;';
    echo '  }';



echo '</script>';
//header("location:adminHome.php");
  }

}
*/


?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Admin Home</title>
<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  

  <body style="background-color:#0d498ddc;">
  <nav class="navbar">
  <a class="navbar-brand" href="#" style="color:#ffffff">  
    Admin Panel
  </a>
</nav> 

    
<div class="jumbotron img-jumbo">

<div class="container-fluid">

  <div class="row">
 <div class="col-md-6">

 <div class="a">

  <table id="table1" class="table table-dark" class="table-responsive">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Serial Num</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Edition</th>
      <th scope="col">Row</th>
      <th scope="col">Column</th>

    </tr>
    </thead>

    <tbody>
      
    
    <?php
      $query = "SELECT * FROM books";

      $result = mysqli_query($conn,$query);

      while($row = mysqli_fetch_array($result))
      {   
        echo "<tr><td>" . $row['serial'] . "</td><td>" . $row['name']. "</td><td>" . $row['author']. "</td><td>" . $row['edition']. "</td><td>" . $row['col']. "</td><td>" . $row['r']  . "</td></tr>";

        }

    ?>

</tbody> 
</table>
      </div>


<!--onclick-->
 <script>
    
var table = document.getElementById('table1');

                
for(var i = 1; i < table.rows.length; i++)
{
table.rows[i].onclick = function()
{
  rIndex = this.rowIndex;
  console.log(rIndex);
 document.getElementById("serial").value = this.cells[0].innerHTML;
 document.getElementById("bname").value = this.cells[1].innerHTML;
 document.getElementById("author").value = this.cells[2].innerHTML;
 document.getElementById("ed").value = this.cells[3].innerHTML;
 document.getElementById("col").value = this.cells[4].innerHTML;
 document.getElementById("r").value = this.cells[5].innerHTML;
 //document.getElementById("bname").value = this.cells[6].innerHTML;

 
  };
  }

/*
  for(var j = 1; j < table2.rows.length; j++){

table2.rows[j].onclick = function()
 {
  rIndex = this.rowIndex;
  console.log(rIndex);
  document.getElementById("book").value = this.cells[0].innerHTML;
  document.getElementById("id").value = this.cells[1].innerHTML;
  document.getElementById("date").value = this.cells[2].innerHTML;

 };
  }
    */
     </script>




<!--onclick ends-->
      

</div> <!--end of first column-->




<!--Form where book's info is taken as input-->

<div class="col-md-3">

  <form action="adminHome.php" method="POST">

    <div class="form-group">
      <input type="text" name="serial" id="serial" class="form-control" placeholder="Serial Number" required>     
    </div>

    <div class="form-group">
      <input type="text" name="bname" id="bname" class="form-control" placeholder="Book Name" required>     
    </div>

    <div class="form-group">
      <input type="text" name="author" id="author" class="form-control" placeholder="Author" required>     
    </div>

    <div class="form-group">
      <input type="text" name="ed" id="ed" class="form-control" placeholder="Edition" required>     
    </div>

    <div class="form-group">
      <input type="text" name="col" id="col" class="form-control" placeholder="Column" required>     
    </div>

    <div class="form-group">
      <input type="text" name="r" id="r" class="form-control" placeholder="Row">     
    </div>

    
  
</div> <!--end of 2nd column-->


<div class="col-md-3">
  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-block" name="save">Save</button>   
  </div>

  <div class="form-group">
    <button class="btn btn-primary btn-block" name="update">Update</button>
  </div>

  <div class="form-group">
    <button class="btn btn-primary btn-block" name="delete">Delete</button>
  </div>

  

  
</div> <!--end of 3rd column-->
</div> <!--end of row1-->




<!--starting row2-->
<div class="row">
  <div class="col-md-6">
    <h2 style="color: #ffffff">Borrwer's List</h2> 


   


</form>



 <!--table2-->
 <div class="b">

<table id="t2" name="t2" class="table table-dark"  >

  <thead class="thead-dark">
  <th scope="col">Name</th>
  <th scope="col">Book Name</th>
  <th scope="col">Date</th>
  </thead>

<tbody>
<?php
$query = "SELECT * FROM borrow";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{   
echo "<tr><td>" . $row['sid'] . "</td><td>" 
. $row['book']. "</td><td>" 
. $row['date']. "</td></tr>";
}
?>
</tbody>

</table>
</div>


<script>
var table2 = document.getElementById('t2');
 for(var j = 1; j < table2.rows.length; j++){

table2.rows[j].onclick = function()
 {
  rIndex = this.rowIndex;
  console.log(rIndex);
  document.getElementById("bid").value = this.cells[0].innerHTML;
  document.getElementById("book").value = this.cells[1].innerHTML;
  document.getElementById("date").value = this.cells[2].innerHTML;

 };
  }
</script>





<!--end of table 2-->
</div> <!--end of column1-->





  <!--borrow and return form-->
<div class="col-md-3">
  
  <form action="adminHome.php" method="POST">

    <div class="form-group">
      <input type="text" name="book" id="book" placeholder="Borrow Book" required>

    </div>

   

    <div class="form-group">
      <input type="text" name="id" id="bid" placeholder="Borrwer Id" required>

    </div>

<div class="form-group">
  <input type="text" name="date" id="date" required="required" placeholder="Date:dd/mm/yy">
  
</div>   
</div> <!--end of col 2-->


<div class="col-md-3">
  <div class="form-group">
    <button class="btn btn-primary btn-block" name="borrow" id="borrow">Borrow</button>
  </div>
  <div class="form-group">
    <button class="btn btn-primary btn-block" id="return" name="return">Return</button>
  </div>
  </form>
    
    <form action="adminHome.php" method="POST">    
    <div class="form-group">
    <button class="btn btn-primary btn-block" name="refresh">Refresh</button>
    </div>

    <div class="form-group">
    <button class="btn btn-primary btn-block" name="home">Home</button>
    </div>
    </form>

    <form action="adminHome.php" method="POST">

    <div class="form-group">
    <button class="btn btn-primary btn-block" name="logout">Logout</button>
    </div>
    </form>

</div> <!--end of col 3-->  
</div> <!--end of row2-->
</div> <!--end of container fluid-->
</div> <!--end of Jumbotron-->


 


<!-- Footer -->
<footer class="page-footer font-small blue" style="color: #ef6336">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a>Habibur Rahman</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
 
 
 
  </body>
</html>