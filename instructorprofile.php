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
    <?php include'_navbar.php'; ?>
   <div class="main-panel" >
    <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="justify-content-between align-items-center">
                <div style="background-color: white; padding: 20px; margin: 20px; margin-left: 30px;">
                <?php
require_once('connection.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$query = "SELECT * FROM tblinstructor_info where Instructor_Id=$id";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<br>
    <fieldset>
      <legend style="font-family: verdana; color:maroon; border: 2px solid; border-color: maroon; text-indent: 10px;" >Instructor Profile</legend>
      <br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px; "><b>Name: </b> <?php echo $row['Name'];?></label><br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Address: </b> <?php echo $row['Address']?></label><br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Birthday: </b><?php echo $row['Birthday']?></label>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Age: </b> <?php echo $row['Age']?></label><br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Gender: </b><?php echo $row['Gender']?></label>
        <br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Contact No.: </b><?php echo $row['Contact_No']?></label><br>
        <label style="text-indent: 15px; color: maroon; font-family: courier; font-size: 20px;"><b>Email: </b><?php echo $row['Email']?></label><br>
        <a class="btn btn-primary submitBtn" href="admininstructor.php" style="float: right; background-color: maroon; color:white;">Back</a>
    </fieldset>
        </div>
      </div>



    <?php }else {
      echo "No Record Found!!";
            }
    ?>
  
    </div>
       <?php include'_footer.php'; ?>
      </div>
    </div>
  </div>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>

