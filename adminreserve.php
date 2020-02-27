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
 <?php include'_navbar.php';?>
      <!-- partial -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">RESERVATION LIST</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
   <?php

require_once('connection.php');
$query = 'SELECT * FROM tblreservation';
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){
?>

                <div class="table100 ver5 m-b-110">
                    <table data-vertable="ver5">
                        <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Reservation Id</th>
                                <th class="column100 column2" data-column="column2">Fullname</th>
                                <th class="column100 column3" data-column="column3">Email</th>
                                <th class="column100 column4" data-column="column4">Contact No.</th>
                                <th class="column100 column5" data-column="column5"></th>
                                <th class="column100 column6" data-column="column6"></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
            <tr class="row100">
                <td class="column100 column1" data-column="column1"><?php echo $rows["Reservation_Id"] ?></td>
                <td class="column100 column2" data-column="column2"><?php echo $rows["Name"]?></td>
                <td class="column100 column3" data-column="column3"><?php echo $rows["Email"]?></td>
                <td class="column100 column4" data-column="column4"><?php echo $rows["Contact_No"]?></td>
                <td class="column100 column5" data-column="column5"><center><a href="add.php?appr=<?php echo $rows['Reservation_Id']?>&student=true&add=true;">APPROVE</a></center></td>
                <td class="column100 column6" data-column="column6"><center><a href="process.php?delr=<?php echo $rows['ReserveId']?>">DELETE</a></center></td>

            </tr>
    <?php } ?>
              </tbody>
                    </table>
                </div>

<?php }else {
    echo "No Record Found!!";
}
?>
          </div>      
<?php include'_footer.php'; ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

