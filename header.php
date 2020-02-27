<?php
if(session_status()!=PHP_SESSION_ACTIVE) {
  session_start();
}
if($_SESSION['username']!=true){
    header('Location:login.php');
    die();
}

require_once('connection.php'); 

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>
  <!-- <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"> -->
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/fontawesome/css/font-awesome.css" />
</head>

<body>