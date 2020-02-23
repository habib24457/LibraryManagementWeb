<?php
session_start();
include('connection.php');


if($_SESSION['user']== true){
  echo("");
}
else{
  header('location:adminLogin.php');
}





if(isset($_POST['makeQuiz'])){
  
  header("location:quiz.php");
}

if(isset($_POST['takeQuiz'])){
  
  header("location:quiz.php");
}

if(isset($_POST['home'])){
  
  header("location:firstPage.html");
}

if(isset($_POST['logout'])){
  session_destroy();
  header('location:studentLogin.php');
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

    <link rel="stylesheet" type="text/css" href="student.css">

    <title>Student Home</title>
  </head>



  <body style="background-color:#0d498ddc;">
<nav class="navbar">
  <a class="navbar-brand" href="#" style="color:#ffffff">  
    Welcome Student
  </a>
</nav>


<div class="jumbotron img-jumbo">
  <div class="container-fluid">
  <h3 style="color:#fff">#List Of Availabe Books</h3>
    <div class="row">
      
      <div class="col-md-6">

        <div class="a1">
       <table id="table1" class="table table-dark">
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
 document.getElementById("s1").value = this.cells[0].innerHTML;
 document.getElementById("s2").value = this.cells[1].innerHTML;
 document.getElementById("s3").value = this.cells[2].innerHTML;
 document.getElementById("s4").value = this.cells[3].innerHTML;
 document.getElementById("s5").value = this.cells[4].innerHTML;
 document.getElementById("s6").value = this.cells[5].innerHTML;
 
  };
  }
    
  </script>

  </div> <!--end of column1-->


  <div class="col-md-3">

    <form action="studentHome.php" method="POST">    
    <div class="form-group">
       <label style="color: #ffffff;">Serial:&nbsp </label>
    <input type="text" id="s1" name="id" class="form-control" style="background:transparent; color: #ffffff;"required onkeydown="return false;">
    </div>

    <div class="form-group">
       <label style="color: #ffffff;">Name:&nbsp </label>
    <input type="text" id="s2" class="form-control" style="background:transparent; color: #ffffff;" readonly>
    </div>

    <div class="form-group">
       <label style="color: #ffffff;">Author: </label>
    <input type="text" id="s3" class="form-control" style="background:transparent; color: #ffffff;" readonly>
    </div>

    <div class="form-group">
       <label style="color: #ffffff;">Edition: </label>
    <input type="text" id="s4" class="form-control" style="background:transparent; color: #ffffff;" readonly>
    </div>

    <div class="form-group">
       <label style="color: #ffffff;">Row:&nbsp &nbsp &nbsp </label>
    <input type="text" id="s5" class="form-control" style="background:transparent; color: #ffffff;" readonly>
    </div>

    <div class="form-group">
       <label style="color: #ffffff;">Column: </label>
    <input type="text" id="s6" class="form-control" style="background:transparent; color: #ffffff;" readonly>
    </div>



   </form>
    
  </div> <!--end of column 2-->



<div class="col-md-3">

<form action="studentHome.php" method="POST">

<div class = "form-group">

<button class="btn btn-primary btn-block" name="takeQuiz" id="takeQuiz">Take a Quiz </button>
<button class="btn btn-primary btn-block" name="home" id="home">Home</button>
<button class="btn btn-primary btn-block" name="logout" id="logout">Logout</button>


</div>

</form>
  
  
</div> <!--end of column 3-->












   </div> <!--end of row--> 
  </div> <!--end of container-->
</div> <!--end of jumbotron-->














    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>