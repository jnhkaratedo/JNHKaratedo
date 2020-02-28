<?php
$servername = "localhost";
$username = "id12685021_jnhkaratedo";
$password = "@jnhkaratedo";
$dbname = "id12685021_jnh_db";

$con = mysqli_connect($servername,$username,$password,$dbname);

	if(!$con){
		die('Please Check your Connection' .mysqli_error());
	}


?>