<?php 
include_once('connection.php');
$class_id = $_GET['delete_class'];

$deletequery = 
"UPDATE tblclass
SET is_deleted = 1
WHERE Class_Id=".$class_id;

if ($con->query($deletequery) === TRUE) {
    echo "Record updated successfully";
    header("location:adminclass.php?Class_id=".$class_id."&&deleteClass=success");
} else {
    echo "Error updating record: " . $con->error;
    header("location:Class_View.php?Class_id=".$class_id."&&deleteclass=failed&&error=".$con->error);
}

?>