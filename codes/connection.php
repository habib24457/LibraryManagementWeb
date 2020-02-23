<?php
$host = "localhost";
$user = "root";
$pass = null;
$db = "LMS";



$conn = mysqli_connect($host,$user,$pass,$db);


if (!$conn) {
	echo "there is a problem";
}

else{
	echo "connected";
}



?>