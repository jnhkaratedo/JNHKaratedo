<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <?php
  session_start();
  $filename=$_SESSION['filename'];
  ?>
<div class="qr-field">
      <h2 style="text-align:center">QR Code Result: </h2>
        <center>
          <div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
              <?php echo '<img src="temp/'.@$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
          </div>
          <a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="downloadqr.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
          <a class="btn btn-primary submitBtn" style="margin:5px 0;" href="adminstudent.php">Back</a>
        </center>
</div>    
 <?php include'_footer.php'; ?>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/dashboard.js"></script>
</body>
</html>

