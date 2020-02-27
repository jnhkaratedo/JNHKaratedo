<?php require 'connection.php';
if (isset($_POST['search'])) {
    $search=$_POST['search'];
    $search=preg_replace("#[^]#","", $search);
}
?>