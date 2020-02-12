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
  <?php include'_navbar.php'; 
    require_once('connection.php');
  if (isset($_GET['student'])===true&&isset($_GET['add'])===true) {
    if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $query = "SELECT * from tblstudent_info where Student_Id=$id"; 
    $result = mysqli_query($con, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result);
    }else if(isset($_GET['appr'])){
    $id=$_GET['appr'];
    $query = "SELECT * from tblreservation where Reservation_Id=$id"; 
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    }
    ?>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><label>Enrollment Form</label><LABEL style="float: right;">Date:<?php echo date("y-m-d")?></LABEL></h4>
                  <p class="card-description">
                    Students Information
                  </p>
                  <form class="forms-sample" method="post" action="process.php">
                    <div class="form-group">
                      <label for="Rank">Rank</label>
                        <select class="form-control" id="Rank" name="Rank" style="width:120px; height: 40px;" required="">
                          <?php if (isset($_GET['edit'])){?>
                            <option>
                              <?php echo $row['Rank']?>
                            </option>
                            <?php } else {?>
                          <option style="background-color: white;">WHITE</option>
                          <option style="background-color: yellow;">YELLOW</option>
                          <OPTION style="background-color: orange;">ORANGE</OPTION>
                          <OPTION style="background-color:green;" >GREEN</OPTION>
                          <OPTION style="background-color:blue;">BLUE</OPTION>
                          <OPTION style="background-color:purple;">PURPLE</OPTION>
                          <OPTION style="background-color:red;">RED</OPTION>
                          <OPTION style="background-color:black;">BLACK</OPTION> 
                        <?php } ?>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input  type="text" name="name" id="name" class="form-control " required="" value="<?php if (isset($_GET['edit'])){echo $row['Name'];}else if(isset($_GET['appr'])){echo $row['Name'];} ?>">
                    </div>
                    <div class="form-group">
                      <label for="Address">Address</label>
                      <input type="text" class="form-control "name="Address"  id="Address" required="" value="<?php if (isset($_GET['edit'])){echo $row['Address'];}?>">
                    </div>
                    <div class="form-group" style="width: 20%; padding: 10px; float: left;">
                      <label for="Birthday">Bithday</label>
                      <input type="date" class="form-control" name="Birthday" id="Birthday" required="" value="<?php if (isset($_GET['edit'])){echo $row['Birthday'];}?>">
                    </div>
                     <div class="form-group" style="width: 10%; padding: 10px; float: left;">
                      <label for="Age">Age</label>
                      <input type="text" class="form-control" name="Age" id="Age" value="<?php if (isset($_GET['edit'])){echo $row['Age'];}?>">
                    </div>
                    <div class="form-group" style="width: 30%; padding: 10px; float: left;" >
                      <label for="Gender">Gender</label>
                        <select class="form-control" id="Gender" name="Gender" required="" value="<?php if (isset($_GET['edit'])){echo $row['Gender'];}?>" >
                          <?php if (isset($_GET['edit'])){?>
                            <option>
                              <?php echo $row['Gender']?>
                            </option>
                            <?php } else {?>
                          <option>Male</option>
                          <option>Female</option>
                        <?php } ?>
                        </select>
                      </div>
                    <div class="form-group" style="width: 40%; padding: 10px; float: left;">
                      <label for="contact">Contact Number</label>
                      <input type="text" class="form-control" name="contact" id="contact" required="" value="<?php if (isset($_GET['edit'])){echo $row['Contact_No'];}else if(isset($_GET['appr'])){echo $row['Contact_No'];}?>">
                    </div>
                     
                        
                    <div class="form-group" style="width: 100%; float:left;">
                    <p class="card-description">
                    Parent's Information
                    </p>
                    </div>
                    <div class="form-group" style=" float:left; width:50%; padding: 10px;">
                      <label for="fname">Father's Name</label>
                      <input type="text" class="form-control" name="fname" id="fname" value="<?php if (isset($_GET['edit'])){echo $row['Fathers_Name'];}?>">
                    </div>
                     <div class="form-group"  style=" float:left; width: 20%; padding:10px;">
                      <label for="FOccupation">Occupation</label>
                      <input type="text" class="form-control" name="FOccupation" id="FOccupation" value="<?php if (isset($_GET['edit'])){echo $row['FOccupation'];}?>">
                    </div>
                    <div class="form-group" style="float: left;width: 30%; padding:10px;">
                      <label for="Fcontact">Contact Number</label>
                      <input type="text" class="form-control" name="Fcontact" id="Fcontact" value="<?php if (isset($_GET['edit'])){echo $row['FContact_No'];}?>">
                    </div>
                       <div class="form-group" style="float:left; width:50%; padding: 10px;">
                      <label for="mname">Mother's Name</label>
                      <input type="text" class="form-control" name="mname" id="mname" value="<?php if (isset($_GET['edit'])){echo $row['Mothers_Name'];}?>">
                    </div>
                     <div class="form-group" style="float:left; width: 20%; padding:10px;">
                      <label for="MOccupation">Occupation</label>
                      <input type="text" class="form-control" name="MOccupation" id="MOccupation" value="<?php if (isset($_GET['edit'])){echo $row['MOccupation'];}?>">
                    </div>
                    <div class="form-group" style="float:left; width: 30%; padding:10px;">
                      <label for="Mcontact">Contact Number</label>
                      <input type="Number" class="form-control" name="Mcontact" id="Mcontact" value="<?php if (isset($_GET['edit'])){echo $row['MContact_No'];}?>">
                    </div>
                    <div class="form-group" style="float: left; width: 30%; padding: 10px;">
                      <label for="Gcontact">Payment</label>
                      <input type="text"class="form-control" id="Payment" name="Payment" value="<?php if (isset($_GET['edit'])){echo $row['Payment'];}?>">
                    </div>
                    <div class="form-group" style="float:left; width: 70%; padding: 10px;" >
                      <label for="Comment">Have you joined other Martial Arts? If Yes, What Club, Style, Rank and Name of your previous Instructor?</label>
                      <input type="text"class="form-control" id="Comment" name="Comment" style="height: 70px; width:100%;" value="<?php if (isset($_GET['edit'])){echo $row['Comment'];}?>">
                    </div>
                    <?php if (isset($_GET['edit'])){?>
                    <button type="submit" name="btnenroll" id="btnenroll" class="btn btn-primary mr-2" style="float: left;">Enroll</button>
                  <?php }else if(isset($_GET['appr'])){?>
                     <button type="submit" name="btnenrollr" id="btnenrollr" class="btn btn-primary mr-2" style="float: left;">Enroll</button>
                   <?php } else{ ?>
                    <button type="submit" name="btnenroll" id="btnenroll" class="btn btn-primary mr-2" style="float: left;">Enroll</button>
                  <?php } ?>
                  </form>
                  <button class="btn btn-light" style="float: left;"><a href="adminstudent.php">Cancel</a></button>
                </div>
              </div>
            </div>
   <?php }else if ($_GET['add']==true&&$_GET['instructor']==true) {
    if (isset($_GET['edit2'])) {
      $id=$_GET['edit2'];
      $query="SELECT * FROM tblinstructor_info WHERE Instructor_Id=$id";
      $result = mysqli_query($con,$query) or die(mysqli_error());  
      $row= mysqli_fetch_assoc($result);
    }
    ?>
     <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><label>Instructor Form</label><LABEL style="float: right;">Date:<?php echo date("y-m-d")?></LABEL></h4>
                  <p class="card-description">
                    Personal Information:
                  </p>
                  <form class="forms-sample" method="post" action="process.php">
                    <div class="form-group">
                      <label for="Rank">Rank</label>
                        <select class="form-control" id="Rank" name="Rank" style="width:120px; height: 40px;" required="" >
                             <?php if (isset($_GET['edit2'])){?>
                            <option>
                              <?php echo $row['Rank']?>
                            </option>
                            <?php } else {?>
                          <option style="background-color: white;">WHITE</option>
                          <option style="background-color: yellow;">YELLOW</option>
                          <OPTION style="background-color: orange;">ORANGE</OPTION>
                          <OPTION style="background-color:green;" >GREEN</OPTION>
                          <OPTION style="background-color:blue;">BLUE</OPTION>
                          <OPTION style="background-color:purple;">PURPLE</OPTION>
                          <OPTION style="background-color:red;">RED</OPTION>
                          <OPTION style="background-color:black;">BLACK</OPTION>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="name">Name</label>
                      <input  type="text" name="name" id="name" class="form-control " required="" value="<?php if(isset($_GET['edit2'])){echo $row['Name'];}?> ">
                    </div>
                    <div class="form-group" style="width: 70%; float: left; padding: 10px;">
                      <label for="Address">Address</label>
                      <input type="text" class="form-control "name="Address"  id="Address" required="" value="<?php if(isset($_GET['edit2'])){echo $row['Address'];}?> ">
                    </div>
                    <div class="form-group" style="width: 30%; padding: 10px; float:left;"">
                      <label for="Birthday">Email</label>
                      <input type="email" class="form-control" name="Email" id="Email" required=""value="<?php if(isset($_GET['edit2'])){echo $row['Email'];}?> ">
                    </div>
                    <div class="form-group" style="width: 20%; padding: 10px; float: left;">
                      <label for="Birthday">Birthday</label>
                      <input type="date" class="form-control" name="Birthday" id="Birthday" required="" value="<?php if (isset($_GET['edit2'])){echo $row['Birthday'];}?>">
                    </div>
                    <div class="form-group" style="width: 10%; padding: 10px; float: left;">
                      <label for="Age">Age</label>
                      <input type="data-toggle" class="form-control" name="Age" id="Age" value="<?php if(isset($_GET['edit2'])){echo $row['Age'];}?> ">
                    </div>
                    <div class="form-group" style="width: 20%; padding: 10px; float: left;" >
                      <label for="Gender">Gender</label>
                        <select class="form-control" id="Gender" name="Gender" required="">
                          <?php if(isset($_GET['edit2'])){?>
                           <option><?php echo $row['Gender']; ?></option>
                           <?php }else{?> 
                          <option>Male</option>
                          <option>Female</option>
                          <?php
                        }
                        ?>
                        </select>
                      </div> 
                      <div class="form-group" style="width: 50%; padding: 10px; float: left;">
                      <label for="contact">Contact Number</label>
                      <input type="text" class="form-control" name="contact" id="contact" required="" value="<?php if(isset($_GET['edit2'])){echo $row['Contact_No'];}?>">
                    </div>
                    <hr>
                    <?php if(isset($_GET['edit2'])){ ?>
                    <button type="submit" name="btnupdate2" id="btnupdate2" class="btn btn-primary mr-2">Update</button> <?php }else{ ?> 
                    <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary mr-2">Submit</button>
                  <?php }?>
                    <button class="btn btn-light"><a href="admininstructor.php">Cancel</a></button>
                  </form>
                </div>
              </div>
            </div>
        <?php } ?>          
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

