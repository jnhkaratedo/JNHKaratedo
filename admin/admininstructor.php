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
  <?php include'_navbar.php'; ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">INSTRUCTOR LIST</h4>
            </div>
            <div class="container-search">
              <form method="POST" action="admininstructor.php" class="form-group">
                <input type="search" name="search" placeholder="Search Name" class="form-control form-contro-sm">
                <div class="search"></div>
              </form>
            </div>
            <div>
              <a class="btn btn-outline-primary btn-rounded" href="instructor_add.php"><i
                  class="fa fa-user-plus" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
$output='';
require_once('connection.php');
if (isset($_POST['search'])) {
$search=$_POST['search'];
$search=preg_replace("#[^0-9a-z]#i"," ",$search);
$query = "SELECT * FROM tblinstructor_info WHERE Name LIKE '%$search%'";
$result = mysqli_query($con,$query);
}else{
$query = "SELECT * FROM tblinstructor_info";
$result = mysqli_query($con,$query);
}
if(mysqli_num_rows($result) > 0){
?>

        <div class="container-fluid table-responsive">
          <table class="table table-striped">
            <thead>
              <tr class="thead-light">
                <th>Id</th>
                <th>Fullname</th>
                <th>Rank</th>
                <th>Actions</th>


              </tr>
            </thead>
            <tbody>
              <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
              <tr>
                <td><?php echo $rows["Instructor_Id"] ?></td>
                <td><?php echo $rows["Name"]?></td>
                <td><?php echo $rows["Rank"]?></td>
                <td>
                  <a href="instructorprofile.php?id=<?php echo $rows['Instructor_Id']?>" name="btnprofile"
                    id="btnprofile" class="btn btn-outline-info btn-sm">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                  </a>


                  <a name="btnedit2" id="btnedit2" class="btn btn-outline-success btn-sm"
                    href="add.php?edit2=<?php echo $rows['Instructor_Id']?>&instructor=true&add=true;">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>


                  <a name="btndelete" id="btndelete" class="btn btn-outline-danger btn-sm"
                    href="process.php?delete=<?php echo $rows['Instructor_Id']?>">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
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
    </div>
  </div>
  </div>
  <script type="text/javascript" src="js/jqueryV3.4.1.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>