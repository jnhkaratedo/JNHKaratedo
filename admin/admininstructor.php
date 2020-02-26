<?php
if(session_status()!=PHP_SESSION_ACTIVE) {
  session_start();
}
if($_SESSION['username']!=true){
    header('Location:login.php');
    die();
}
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




  <!-- Modal -->
  <div class="modal fade show" id="ModalAddInstructor" tabindex="-1" role="dialog" aria-labelledby="ModalAddInstructorLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content ">
        <div class="modal-body p-0 bg-success text-light">
          <div class="container-fluid p-3">
            <h5 class="modal-title" id="ModalAddInstructorLabel">Add New Instructor
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </h5>
          </div>

          <div class="col-12 d-flex justify-content-center py-5">
            <img src="images/user-default-grey.png" alt="" class="img-fluid mx-auto shadow-md"
              style="height:150px;border-radius:50%;border:solid 1px red;" />
          </div>
          <div class="container-fluid p-3 bg-light text-dark">
            <form action="addinstructor.php" method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="instrImage" name="instrImage" required>
                  <label class="custom-file-label" for="customFile">Upload Profile picture</label>
                </div>
                <div class="form-group col-md-12">
                  <label for="instrName">Name</label>
                  <input type="text" class="form-control" id="instrName" name="instrName" placeholder="Juan D Dela Cruz" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="instrRank">Rank</label>
                  <input type="text" class="form-control" id="instrRank" name="instrRank" placeholder="belt color">
                </div>
                <div class="form-group col-md-12">
                  <label for="instrRank">Email</label>
                  <input type="email" class="form-control" id="instrEmail" name="instrEmail" placeholder="belt color" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="instrRank">Contact</label>
                  <input type="int" class="form-control" id="instrContact" name="instrContact" placeholder="09-xxx-xxxx" requeired>
                </div>
              </div>

              <div class="form-group">
                <label for="instrBday">birthdate</label>
                <input type="date" class="form-control" id="instrBday" name="instrBday" max="2002-01-01" required>
              </div>
              <div class="form-group">
                <label for="instrGender">Gender</label>
                <select id="instrGender" name="instrGender" class="form-control">
                  <option selected>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="others">others</option>
                </select>
              </div>
              <div class="form-group">
                <label for="instrAddress">Address</label>
                <input type="text" class="form-control" id="instrAddress" name="instrAddress"
                  placeholder="house number, street, barangay, municipality, city" required>
              </div>





              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>



      </div>
    </div>
  </div>
  <!-- modal -->
  <?php
  include'_navbar.php';
  require_once('connection.php'); 
   ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">


        <div class="col-md-6">
          <h4 class="font-weight-bold mb-0">INSTRUCTOR LIST</h4>
        </div>
        <div class="col-md-6">
          <!-- <a class="ti-clipboard btn-icon-prepend btn btn-primary btn-icon-text btn-rounded" href="addmanager.php">ADD
                    </a> -->
          <div class="row">
            <div class="col-md-4 mb-3 text-right">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-outline-primary btn-rounded" data-toggle="modal"
                data-target="#ModalAddInstructor">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
              </button>
            </div>
            <div class="col-md-8">
              <form method="POST" action="admininstructor.php">
                <div class="input-group mb-3">
                  <input type="search" name="search" class="form-control">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Search</button>
                  </div>
                </div>
              </form>
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
  <!-- <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script> -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
  $(document).ready(function(){
    <?php 
      if(isset($_SESSION["status"])){
      ?>swal({
      title: "Message",
      text: "<?php echo $_SESSION["status"];?>",
      icon: "warning",
      button: "ok"

    });
      <?php 
    unset($_SESSION["status"]);  
    
    }
      
      ?>
  });
  </script>
</body>

</html>