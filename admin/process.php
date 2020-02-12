<?php
session_start();
require_once('connection.php');
 if (isset($_POST['submit'])) {
	if(empty($_POST['username']) || empty($_POST['password'])){
		header("location:login.php? Empty=Please fill the blanks!");
	} else{
		$query= "select * from tblusers where Username='".$_POST['username']."' and Password='".$_POST['password']."'";
		$result = mysqli_query($con,$query);
		if(mysqli_fetch_assoc($result)){
			$_SESSION["username"]=$_POST['username'];
			header("location:index.php");
		}else{
			header("location:login.php?Invalid=Enter Correct Username or Password");
		}
	}
} else if (isset($_POST['btnenroll'])) {
		var_dump($_POST['btnenroll']);
			$payment=$_POST['Payment'];
			$balance=1000;
			$totalbalance=$balance-$payment;
			$query= "insert into tblstudent_info ( Rank,Name, Address, Birthday,Age, Gender, Contact_No, Comment, Payment, Balance,Fathers_Name,FOccupation,FContact_No,Mothers_Name,MOccupation,MContact_No) 
			values 
			('".$_POST['Rank']."','".$_POST['name']."','".$_POST['Address']."','".$_POST['Birthday']."','".$_POST['Age']."','".$_POST['Gender']."', '".$_POST['contact']."', '".$_POST['Comment']."', '".$_POST['Payment']."', $totalbalance,
			'".$_POST['fname']."', '".$_POST['FOccupation']."', '".$_POST['Fcontact']."', '".$_POST['mname']."', '".$_POST['MOccupation']."', '".$_POST['Mcontact']."')";
			
			if($con->query($query)===true)
				{
				include('phpqrcode/qrlib.php'); 
				$name=$_POST['name'];
				$filename=$name;
				$tempDir = 'temp/'; 
				$_SESSION['filename']=$filename;
				$codeContents ='Fullname='.$_POST['name'];
				QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
				header("location:viewqr.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_POST['btnenrollr'])) {
			$id=$_POST['id'];
			$query= "DELETE FROM tblreservation WHERE Reservation_Id=$id";
			if($con->query($query)===true)
				{
				$payment=$_POST['Payment'];
			$balance=1000;
			$totalbalance=$balance-$payment;
			$query= "insert into tblstudents (Fullname,Address,Birthday,Age,ContactNo,GuardiansName,GAddress,GContactNo,Payment,Balance) values ('".$_POST['Sname']."','".$_POST['SAddress']."','".$_POST['SBirthday']."','".$_POST['SAge']."','".$_POST['Scontact']."','".$_POST['Gname']."','".$_POST['GAddress']."','".$_POST['Gcontact']."','".$_POST['Payment']."',$totalbalance)";
			include('phpqrcode/qrlib.php');
			if($con->query($query)===true)
				{
				$query="select Student_Id FROM tblstudents_info where fullname='$sname' AND Address='$saddress' AND Birthday='$Sbirthday' AND ContactNo='$Scontact' AND GuardiansName='$Gname' AND GContactNo='$Gcontact' AND GAddress='$Gaddress' AND Payment='$payment' ";
				$filename=$sname;
				$tempDir = 'temp/'; 
				$_SESSION['filename']=$filename;
				$codeContents ='Fullname:'.$sname;
				QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
				header("location:viewqr.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
			
	}else if (isset($_POST['btnupdate'])) {
			$payment=$_POST['Payment'];
			$balance=1000;
			$totalbalance=$balance-$payment;
			$query= "update tblstudent_info SET Name ='".$_POST['Name']."', Address='".$_POST['SAddress']."', Birthday='".$_POST['SBirthday']."', Age='".$_POST['SAge']."', ContactNo='".$_POST['Scontact']."' ,GuardiansName='".$_POST['Gname']."' , GAddress='".$_POST['GAddress']."' ,GContactNo='".$_POST['Gcontact']."', Payment='".$_POST['Payment']."', Balance='$totalbalance'";

			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminstudent.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_POST['btnupdate2'])) {
			$query= "update tblinstructor_info SET Name ='".$_POST['name']."', Address='".$_POST['Address']."', Birthday='".$_POST['Birthday']."', Age='".$_POST['Age']."', Contact_No='".$_POST['contact']."' ,Gender='".$_POST['Gender']."' , Email='".$_POST['Email']."'";

			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminstudent.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_GET['dels'])) {
			$id = $_GET['dels'];
			$query= "DELETE FROM tblstudent_info WHERE Student_Id=$id";

			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminstudent.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$query= "DELETE FROM tblinstructor_info WHERE Instructor_Id=$id";
			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:admininstructor.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_GET['delr'])) {
			$id = $_GET['delr'];
			$query= "DELETE FROM tblreservation WHERE Reservation_Id=$id";

			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminreservation.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
		}else if (isset($_POST['btnadd'])) {
			$query= "insert into tblinstructor_info ( Rank,Name, Address, Birthday,Age, Gender, Contact_No, Email) 
			values 
			('".$_POST['Rank']."','".$_POST['name']."','".$_POST['Address']."','".$_POST['Birthday']."','".$_POST['Age']."','".$_POST['Gender']."', '".$_POST['contact']."', '".$_POST['Email']."')";
			
			if($con->query($query)===true)
				{
				header("location:admininstructor.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}


	}else{
		echo "Not Working";
	}
?>
