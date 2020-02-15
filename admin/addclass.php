<?php
include_once("connection.php");
var_dump($_POST);
//array(4) { ["Class_title"]=> string(16) "Karatedosadfadsf" ["Class_location"]=> string(7) "adfadsf" ["Date_from"]=> string(10) "2020-02-03" ["Date_to"]=> string(10) "2020-02-22" } Mon


// prepare and bind
$stmt = $con->prepare("INSERT INTO tblclass (Instructor_Id, Class_title, Location, Date_from, Date_to, Day) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('isssss',$instructorId, $title, $loc, $dfrom, $dto, $day);

// set parameters and execute
$title = $_POST['Class_title'];
$instructorId =$_POST['ClassInstructor'];
$loc = $_POST['Class_location'];
$dfrom = $_POST['Date_from'];
$dto = $_POST['Date_to'];
$day = date("D", strtotime($_POST['Date_from']));
$stmt->execute();

// $firstname = "Mary";
// $lastname = "Moe";
// $email = "mary@example.com";
// $stmt->execute();

// $firstname = "Julie";
// $lastname = "Dooley";
// $email = "julie@example.com";
// $stmt->execute();

echo "New records created successfully";

$stmt->close();

header("location:adminclass.php?addClass=success");


?>