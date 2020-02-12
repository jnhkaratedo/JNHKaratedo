<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
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
                  <h4 class="font-weight-bold mb-0">INSTRUCTOR LIST</h4>
                </div>
                <div>
                  <form method="POST" action="admininstructor.php" class="form-group">
                    <input type="search" name="search" placeholder="Search Name" class="form-control form-contro-sm">
                  </form>
                </div>
                <div>
                    <a class="ti-clipboard btn-icon-prepend btn btn-primary btn-icon-text btn-rounded" href="add.php?add=true&instructor=true">ADD
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

                <div class="table100 ver5 m-b-110" style="align-self: center;">
                    <table data-vertable="ver5">
                        <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Id</th>
                                <th class="column100 column2" data-column="column2">Fullname</th>
                                <th class="column100 column3" data-column="column3">Rank</th>
                                <th class="column100 column4" data-column="column4"></th>
                                <th class="column100 column5" data-column="column5"></th>
                                <th class="column100 column6" data-column="column6"></th>
                        
                            </tr>
                        </thead>
                        <tbody>
    <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
            <tr class="row100">
                <td class="column100 column1" data-column="column1"><?php echo $rows["Instructor_Id"] ?></td>
                <td class="column100 column2" data-column="column2"><?php echo $rows["Name"]?></td>
                 <td class="column100 column3" data-column="column3"><?php echo $rows["Rank"]?></td>
                <td class="column100 column4" data-column="column4">
                  <button name="btnprofile" id="btnprofile" class="btn-icon-text">
                    <a href="instructorprofile.php?id=<?php echo $rows['Instructor_Id']?>">Profile
                  </button>
                </td>
                <td class="column100 column5" data-column="column5">
                   <a name="btnedit2" id="btnedit2" class="btn-icon-prepend" href="add.php?edit2=<?php echo $rows['Instructor_Id']?>&instructor=true&add=true;">
                   <img src="images/icons/editicon.png" style="height: :9px;width:15px;"> </a>
               </td> 
                 <td class="column100 column6" data-column="column6">
                    <a name="btndelete" id="btndelete" class="btn-icon-prepend" href="process.php?delete=<?php echo $rows['Instructor_Id']?>">
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

