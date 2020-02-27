<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>

  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <?php
    include'_navbar.php'; 
    require_once('connection.php');
    if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $_SESSION['id']=$id;
    $query="SELECT * FROM tblmanager WHERE manager_id=$id";
    $result = mysqli_query($con, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
    }
    ?>

<

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><LABEL style="float: right;">Date:<?php echo date("y-m-d")?></LABEL></h4>
              <p class="card-description">
                Managers Information
              </p>
              <form class="forms-sample" method="post" action="manager.php">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name" class="form-control " required=""
                    value="<?php if (isset($_GET['edit'])){echo $row['Name'];} ?>">
                </div>
                <div class="form-group">
                  <label for="Address">Address</label>
                  <input type="text" class="form-control " name="Address" id="Address" required=""
                    value="<?php if (isset($_GET['edit'])){echo $row['Address'];}?>">
                </div>
                <div class="form-group" style="width: 20%; padding: 10px; float: left;">
                  <label for="Birthday">Bithday</label>
                  <input type="date" class="form-control" name="Birthday" id="Birthday" required=""
                    value="<?php if (isset($_GET['edit'])){echo $row['Birthday'];}?>">
                </div>
                <div class="form-group" style="width: 10%; padding: 10px; float: left;">
                  <label for="Age">Age</label>
                  <input type="text" class="form-control" name="Age" id="Age"
                    value="<?php if (isset($_GET['edit'])){echo $row['Age'];}?>">
                </div>
                <div class="form-group" style="width: 30%; padding: 10px; float: left;">
                  <label for="Gender">Gender</label>
                  <select class="form-control" id="Gender" name="Gender" required=""
                    value="<?php if (isset($_GET['edit'])){echo $row['Gender'];}?>">
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="form-group" style="float:left; width: 40%; padding:10px;">
                  <label for="contact">Contact Number</label>
                  <input type="Number" class="form-control" name="contact" id="contact"
                    value="<?php if (isset($_GET['edit'])){echo $row['Contact_No'];}?>">
                </div>
                <?php if (isset($_GET['edit'])){?>
                  <button type="submit" name="btnupdate" id="btnupdate" class="btn btn-primary mr-2"
                  style="float: left;">UPDATE</button>
                <?php } else{ ?>
                <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary mr-2"
                  style="float: left;">ADD</button>
                <?php } ?>
                
                  <button class="btn btn-primary mr-2" href="adminmanager.php" style="float: left;">BACK</button>
              </form>
            
            </div>
          </div>
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