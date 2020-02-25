
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
  <link rel="stylesheet" href="css/fontawesome/css/font-awesome.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<?php include'_navbar.php'; ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><label>Instructor Form</label><LABEL
                        style="float: right;">Date:20-02-25</LABEL></h4>
                    <p class="card-description">
                      Personal Information:
                    </p>
                    <form class="forms-sample" method="post" action="process.php">
                      <div class="form-group">
                        <label for="Rank">Rank</label>
                        <select class="form-control" id="Rank" name="Rank" style="width:120px; height: 40px;"
                          required="">
                                                    <option style="background-color: white;">WHITE</option>
                          <option style="background-color: yellow;">YELLOW</option>
                          <OPTION style="background-color: orange;">ORANGE</OPTION>
                          <OPTION style="background-color:green;">GREEN</OPTION>
                          <OPTION style="background-color:blue;">BLUE</OPTION>
                          <OPTION style="background-color:purple;">PURPLE</OPTION>
                          <OPTION style="background-color:red;">RED</OPTION>
                          <OPTION style="background-color:black;">BLACK</OPTION>
                                                  </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control " required=""
                          value=" ">
                      </div>
                      <div class="form-group" style="width: 70%; float: left; padding: 10px;">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control " name="Address" id="Address" required=""
                          value=" ">
                      </div>
                      <div class="form-group" style="width: 30%; padding: 10px; float:left;"">
                      <label for=" Birthday">Email</label>
                        <input type="email" class="form-control" name="Email" id="Email" required=""
                          value=" ">
                      </div>
                      <div class="form-group" style="width: 20%; padding: 10px; float: left;">
                        <label for="Birthday">Birthday</label>
                        <input type="date" class="form-control" name="Birthday" id="Birthday" required=""
                          value="">
                      </div>
                      <div class="form-group" style="width: 10%; padding: 10px; float: left;">
                        <label for="Age">Age</label>
                        <input type="data-toggle" class="form-control" name="Age" id="Age"
                          value=" ">
                      </div>
                      <div class="form-group" style="width: 20%; padding: 10px; float: left;">
                        <label for="Gender">Gender</label>
                        <select class="form-control" id="Gender" name="Gender" required="">
                                                    <option>Male</option>
                          <option>Female</option>
                                                  </select>
                      </div>
                      <div class="form-group" style="width: 50%; padding: 10px; float: left;">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" name="contact" id="contact" required=""
                          value="">
                      </div>
                      <hr>
                                            <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary mr-2">Submit</button>
                                            <button class="btn btn-light"><a href="admininstructor.php">Cancel</a></button>
                    </form>
                  </div>
                </div>
              </div>
                                    <footer class="footer" style="width: 100%;">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> JNH KARATEDO</span>
          </div>
        </footer>            </div>
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