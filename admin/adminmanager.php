<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="admin/css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <?php include'_navbar.php'; ?>

   <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="search-container">
                  <form method="POST" action="adminmanager.php">
                  <input type="text" name="search" placeholder="Search..." class="form-control form-contro-sm">
                    <div class="search"></div>
                  </form>
                </div>
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">MANAGER LIST</h4>
                </div>
                <div>
                    <a class="ti-clipboard btn-icon-prepend btn btn-primary btn-icon-text btn-rounded" href="addmanager.php">ADD
                    </a>
                </div>
              </div>
            </div>
          </div>
<div class="row">
<?php

require_once('connection.php');
if (isset($_POST['search'])) {
$search=$_POST['search'];
$search=preg_replace("#[^0-9a-z]#i"," ",$search);
$query = "SELECT * FROM tblmanager WHERE Name LIKE '%$search%'";
$result = mysqli_query($con,$query);
}else{
$query = 'SELECT * FROM tblmanager';
$result = mysqli_query($con,$query);
}
if(mysqli_num_rows($result) > 0){
?>

                <div class="table100 ver5 m-b-110" style="align-self: center;">
                    <table data-vertable="ver5">
                        <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Id</th>
                                <th class="column100 column2" data-column="column2">Fullname</th>
                                <th class="column100 column3" data-column="column3">Gender</th>
                                 <th class="column100 column4" data-column="column4">Address</th>
                                 <th class="column100 column5" data-column="column5">Birthday</th>
                                <th class="column100 column6" data-column="column6">Age</th>
                                 <th class="column100 column7" data-column="column7">Contact No</th>
                                <th class="column100 column8" data-column="column8"></th>
                                <th class="column100 column9" data-column="column9"></th>
                        
                            </tr>
                        </thead>
                        <tbody>
    <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
            <tr class="row100">
                <td class="column100 column1" data-column="column1"><?php echo $rows["manager_id"];?></td>
                <td class="column100 column2" data-column="column2"><?php echo $rows["Name"];?></td>
                <td class="column100 column3" data-column="column2"><?php echo $rows["Gender"];?></td>
                <td class="column100 column4" data-column="column3"><?php echo $rows['Address'];?></td>
                <td class="column100 column5" data-column="column4"><?php echo $rows["Birthday"];?></td>
                <td class="column100 column6" data-column="column5"><?php echo $rows["Age"];?></td>
                <td class="column100 column7" data-column="column6"><?php echo $rows["Contact_No"];?></td>
                <td class="column100 column8" data-column="column7">
                   <a name="btnedit" id="btnedit" class="btn-icon-prepend" href="addmanager.php?edit=<?php echo $rows['manager_id']?>">
                   <img src="images/icons/editicon.png" style="height: :9px;width:15px;"> </a>
               </td> 
                 <td class="column100 column9" data-column="column8">
                    <a name="btndelete" id="btndelete" class="btn-icon-prepend" href="manager.php?delete=<?php echo $rows['manager_id']?>">
                     <img src="images/icons/deleteicon.png"  style="height: :9px;width:15px;">
                </td>   
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
        <!-- partial -->
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

