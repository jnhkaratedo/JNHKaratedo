<?php
    require_once('connection.php');
    session_start();
    var_dump(session_start());
    if(!isset($_SESSION['username'])){
        header('location:login.php');
        die();
    }

?>