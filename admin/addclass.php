<?php
include_once("connection.php");
var_dump($_POST);
//array(4) { ["Class_title"]=> string(16) "Karatedosadfadsf" ["Class_location"]=> string(7) "adfadsf" ["Date_from"]=> string(10) "2020-02-03" ["Date_to"]=> string(10) "2020-02-22" } Mon

// set parameters and execute
$title = $_POST['Class_title'];
$loc = $_POST['Class_location'];
$dfrom = $_POST['Date_from'];
$dto = $_POST['Date_to'];
$day = date("l", strtotime($_POST['Date_from']));
// prepare and bind
$stmt = $con->prepare("INSERT INTO tblclass (Class_title, Location, Date_from, Date_to, Day) VALUES (?, ?, ?, ?, ?)");

if(
    $stmt &&
    $stmt->bind_param('sssss', $title, $loc, $dfrom, $dto, $day) &&
    $stmt -> execute()
)
{
    echo "New class record created successfully <br>";
    $inserted_id = $stmt->insert_id;
    
}else{
    echo $con -> error;
}
$stmt->close();
$con->close();

// $firstname = "Mary";
// $lastname = "Moe";
// $email = "mary@example.com";
// $stmt->execute();

// $firstname = "Julie";
// $lastname = "Dooley";
// $email = "julie@example.com";
// $stmt->execute();


var_dump($inserted_id);

$con = mysqli_connect('localhost','root','','jnh_db');
$instructorId =$_POST['ClassInstructor'];
$sql = "INSERT INTO tblinstructor_class (instructor_id , class_id) VALUES ( ?, ?)";
$stmt1 = $con->prepare($sql);
var_dump($sql);
if(
    $stmt1 &&
    $stmt1->bind_param('ii', $inserted_id, $instructorId) &&
    $stmt1->execute()
){
    echo "New instructor_class record created successfully";
    $stmt1->close();
    header("location:adminclass.php?addClass=success");
}else{
    echo $con -> error;
}






?>