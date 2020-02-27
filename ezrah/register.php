<?php 
require_once("connection.php");

if(isset($_GET['student'])&&$_GET['student']=='reservation');
$name = $_POST['RegFname']." ".$_POST['RegLname'];
$email = $_POST['RegEmail'];
$birthday =$_POST['RegBdate'];
$date = date('Y-m-d');

$date = new DateTime($birthday);
$now = new DateTime();
$age = $now->diff($date);

$age = $age->y;
$Contact =$_POST['RegContact'];
$gender = $_POST['Gender'];

$query= "insert into tblreservation (Name,Email,Contact_No) values ('"
.$name."','".$email."','".$Contact."')";

if($con->query($query)===true)
		{
		$query = "insert into tblstudent_info (Name,Birthday,Age,Gender,Contact_No) values ('".
		$name."','".$birthday."','".$age."','".$gender."','".$Contact."');";
		if($con->query($query)===true){
			header("location:Index.php?success=true");	
			}else {
			header("location:Index.php?error=".$query.$con->error);
			}
			
		} else {
			header("location:Index.php?error=".$query.$con->error);
		}

    
?>