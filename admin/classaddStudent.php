<?php
include_once('connection.php');

var_dump($_POST);
$class_id = $_GET["Class_id"];
$student_id = $_POST['Student_Id'];

foreach ($student_id as $val){
    echo 'Student_id : '.$val;
    $query = "
    INSERT into tblstudentclass (Class_Id,Student_Id)
    values ('.$class_id.','.$val.')";
    if ($con->query($query) === TRUE) {
        echo "New record created successfully";
        header('Location:Class_View.php?Class_id='.$class_id);
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}



?>