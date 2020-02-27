<?php
session_start();
require_once('connection.php');
if (isset($_POST['btnupdate'])) {
	$id = $_SESSION['id'];
	$query= "UPDATE tblmanager SET Name='".$_POST['name']."',Address='".$_POST['Address']."',Birthday='".$_POST['Birthday']."', Age='".$_POST['Age']."', Gender='".$_POST['Gender']."', Contact_No='".$_POST['contact']."' WHERE manager_id=$id";
	var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminmanager.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
}else if (isset($_GET['delete'])) {
			$id = $_GET['delete'];
			$query= "DELETE FROM tblmanager WHERE manager_id=$id";

			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminmanager.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
	}else if (isset($_POST['btnadd'])) {
	$query= "INSERT INTO tblmanager (Name,Address,Birthday,Age,Gender,Contact_No) VALUES ('".$_POST['name']."','".$_POST['Address']."','".$_POST['Birthday']."','".$_POST['Age']."','".$_POST['Gender']."','".$_POST['contact']."')";
			var_dump($query);
			if($con->query($query)===true)
				{
				header("location:adminmanager.php");
			} else {
				echo "Error:".$query."<br>".$con->error;
			}
}
?>