
  <?php 
  include'header.php';
  include'_navbar.php'; ?>
  <!-- Add manager modal -->
  <div class="modal fade" id="ModalAddManager" tabindex="-1" role="dialog" aria-labelledby="ModalAddManagerLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalAddManagerLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="container">
          <form>
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="Username" name="Username"
                placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
            </div>
            <div class="form-check d-none">
              <input class="form-check-input" type="checkbox" value="manager" id="chkrole">
              <label class="form-check-label" for="defaultCheck1">
                Role
              </label>
            </div>
            <hr class="my-3">
            <div class="form-group">
              <label for="Username">First name</label>
              <input type="text" class="form-control" id="fname" name="fname"
                placeholder="Juanico">
            </div>
            <div class="form-group">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="lname" name="Username"
                placeholder="Dela Cruz">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- add manager modal -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">


        <div class="col-md-6">
          <h4 class="font-weight-bold mb-0">MANAGER LIST</h4>
        </div>
        <div class="col-md-6">
          <!-- <a class="ti-clipboard btn-icon-prepend btn btn-primary btn-icon-text btn-rounded" href="addmanager.php">ADD
                    </a> -->
          <div class="row">
            <div class="col-md-4 mb-3 text-right">
              <button type="button" class="btn btn-info text-light" data-toggle="modal" data-target="#ModalAddManager">New</button>
            </div>
            <div class="col-md-8">
              <form method="POST" action="adminmanager.php">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                  <a name="btnedit" id="btnedit" class="btn-icon-prepend"
                    href="addmanager.php?edit=<?php echo $rows['manager_id']?>">
                    <img src="images/icons/editicon.png" style="height: :9px;width:15px;"> </a>
                </td>
                <td class="column100 column9" data-column="column8">
                  <a name="btndelete" id="btndelete" class="btn-icon-prepend"
                    href="manager.php?delete=<?php echo $rows['manager_id']?>">
                    <img src="images/icons/deleteicon.png" style="height: :9px;width:15px;">
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
  <?php include'scripts.php';?>
</body>

</html>