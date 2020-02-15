<?php
// var_dump($_POST);
// echo $_GET['Class_id'];
include_once("connection.php");
$title = $_POST['Class_title'];
$loc = $_POST['Class_location'];
$Dfrom = $_POST['Date_from'];
$Dto = $_POST['Date_to'];
$updatequery = 
"UPDATE tblclass SET Class_title ='".$title."',Location='".$loc."',Date_to='".$Dto."',Date_from='".$Dfrom."' WHERE Class_Id=".$_GET['Class_id'];
var_dump($updatequery);

if ($con->query($updatequery) === TRUE) {
    echo "Record updated successfully";
    header("location:Class_View.php?Class_id=".$_GET['Class_id']."&&editClass=success");
} else {
    echo "Error updating record: " . $con->error;
    header("location:Class_View.php?Class_id=".$_GET['Class_id']."&&editClass=failed&&error=".$con->error);
}


?>