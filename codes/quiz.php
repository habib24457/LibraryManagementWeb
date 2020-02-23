<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="s3.css">
<title>Quiz</title>
</head>

  <body>
   
  <nav class="navbar ">
  <a class="navbar-brand" href="#" style="color:#ffffff"> 
    Quiz
  </a>
</nav>

<div class="jumbotron img-jumbo">

<div class="container-fluid">
<form action="quiz.php" method="POST">

<div class="row">

<div class="col-md-3">
    


</div>


<div class="col-md-6">
    <form name="quiz">

      Q1.Who is the writer of Lord Of The Ring? <br>
      <div class="form-group">
      <input class="form-control" type="text" id="ans1" autocomplete="off">
      </div>
      

      <br>Q2.In which year 'The three Musketeers' was originally published?
      <div class="form-group">
      <input class="form-control" type="text" id="ans2" autocomplete="off">
      </div>

      <br>Q3.How many Harry Potter books are there and How many movies?
      <div class="form-group">
      <input class="form-control" type="text" id="ans3" autocomplete="off" placeholder="Books,Movies">
      </div>

      <br>Q4.Who wrote Game Of Thrones?
      <div class="form-group">
      <input class="form-control" type="text" id="ans4" autocomplete="off">
      </div>

      <br>Q5.Write down the name of a stupid vampire Book?
      <div class="form-group">
      <input class="form-control" type="text" id="ans5" autocomplete="off">
      </div>


  

  

  <div>
    <button class="btn btn-primary btn-block" id="submit" name="submit">Submit</button>
</div>

</form>


<script>
/*

$(document).ready(function(){

  $('#submit').on('click', function () {
        
        alert("pressed");      
      
            });

});
*/


  /*
  function check(){
    var q1=document.myform.q1.value;
    var q2=document.myform.q2.value;
    
var count = 0;

if(q1=="b"){
  count++;
}
if(q2=="b"){
  count++;
}

alert("your score"+count+"points");
  }
*/

</script>



</div> <!--end of column 2-->



<div class="col-md-3">


</div> <!--end of col3--> 
</div>  <!--end of row-->

</form>
</div> <!--end of container-->
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  
    <script>

$(document).ready(function(){

$('#submit').on('click', function () {

  var q1 = document.getElementById('ans1').value;
  var q2 = document.getElementById('ans2').value;
  var q3 = document.getElementById('ans3').value;
  var q4 = document.getElementById('ans4').value;
  var q5 = document.getElementById('ans5').value;

  //var x = document.quiz.q1.value;
  //var y = document.quiz.q2.value;
  //var x1 = document.getElementById("A1");
  //var x2 = document.getElementById("A2");
  var c = 0;

  if(q1 == "J R R Tolkien"){
    c++;
  }

  if(q2 == "1844"){
    c++;
  }

  if(q3 == "7,8"){
    c++;
  }
  if(q4 == "George R.R. Martin"){
    c++;
  }
  if(q5 == "Twilight"){
    c++;
  }
        
alert("your score points="+c);
       
            });

});

</script>
  
  
  </body>
</html>