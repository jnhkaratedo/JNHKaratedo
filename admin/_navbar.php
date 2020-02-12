<?php
session_start();
if($_SESSION['username']!=true){
    header('Location:login.php');
    die();
}
?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-7" href="index.html"><img src="images\jnhlogo2.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images\jnhlogo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          
        <ul class="navbar-nav navbar-nav-right">
         
            <li class="nav-item nav-profile dropdown">

               <div><b><?php echo "Hi " .$_SESSION['username']."!";?> &nbsp</b></div>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              <img src="images/cyh.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="Logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:  #800000">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="adminreserve.php">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title">Reservation List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminclass.php">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">Class List</span>
            </a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" href="admininstructor.php">
              <i class="ti-agenda menu-icon"></i>
              <span class="menu-title">Instructor List</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="adminstudent.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Student List</span>
            </a>
          </li>
          
        </ul>
      </nav>
