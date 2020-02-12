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
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">STUDENT PROFILE</h4>
                </div>
              </div>
            </div>
          </div>

<div style="background-color: white; padding: 10px; border-color: black;">
<?php
require_once('connection.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$query = "SELECT * FROM tblstudent_info where Student_Id=$id";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<div class="" style="width: 70%;margin-right: auto;margin-left: auto;display: block;border: solid 1px red;text-align: center;border-radius: 10px;">
  <div style="margin:5% 20px;">
  <img style="width: 150px; height: 150px;border-radius: 50%;" src="images/cyh.jpg" alt=""/>
  </div>
  <hr>
  <div class="container emp-profile" style="margin-top:10%;margin-bottom: 10%;padding: 0 5%;">
            <form method="post">
                <div class="row justify-content-center">
                    
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $row['Name'];?>
                                    </h5>
                                    <p class="proile-rating">RANK : <span><?php echo $row['Rank'];?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">QRCODE</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                </div>
                      <div class="row justify-content-center">
                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <?php 
                                        if(isset($row['date']))
                                          {
                                            echo "<label><b>Date Enrolled: </b>".$row['Date'];
                                          }
                                          ?>
                                        </label><br>
                                        <label><b>Name: </b> <?php echo $row['Name'];?></label><br>
                                        <label><b>Address: </b> <?php echo $row['Address']?></label><br>
                                        <label><b>Birthday: </b><?php echo $row['Birthday']?></label>
                                        <label><b>Age: </b> <?php echo $row['Age']?></label><br>
                                        <label><b>Gender: </b><?php echo $row['Gender']?></label>
                                        <label><b>Contact No.: </b><?php echo $row['Contact_No']?></label><br>
                                        <h3>Guardians Information</h3>
                                        <label><b>Father's Name: </b><?php echo $row['Fathers_Name']?></label><br>
                                        <label><b>Occupation: </b><?php echo $row['FOccupation']?></label>
                                        <label><b>Contact No.: </b><?php echo $row['FContact_No']?></label><br>
                                        <label><b>Mother's Name: </b><?php echo $row['Mothers_Name']?></label><br>
                                        <label><b>Occupation: </b><?php echo $row['MOccupation']?></label>
                                        <label><b>Contact No.: </b><?php echo $row['MContact_No']?></label><br>
                                        <a class="btn btn-primary submitBtn" href="print.php?id=<?php echo $row['Student_Id'];?>">Print</a>
                                        <a class="btn btn-primary submitBtn" href="adminstudent.php">Back</a>
                                       
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row justify-content-center">
                                      <div class="col-12">
                                          <h2 style="text-align:center">QR Code Result: </h2>
                                          <center>
                                            <div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
                                                <?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
                                            </div>
                                            <a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="downloadqr.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
                                            </center>
                                          </div>
                                    </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
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

