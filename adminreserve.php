
 <?php 
 
 include'header.php';
 include'_navbar.php';?>
      <!-- partial -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">RESERVATION LIST</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
   <?php

$query = 'SELECT * FROM tblreservation';
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) > 0){
?>

                <div class="table100 ver5 m-b-110">
                    <table data-vertable="ver5">
                        <thead>
                            <tr class="row100 head">
                                <th class="column100 column1" data-column="column1">Reservation Id</th>
                                <th class="column100 column2" data-column="column2">Fullname</th>
                                <th class="column100 column3" data-column="column3">Email</th>
                                <th class="column100 column4" data-column="column4">Contact No.</th>
                                <th class="column100 column5" data-column="column5"></th>
                                <th class="column100 column6" data-column="column6"></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
            <tr class="row100">
                <td class="column100 column1" data-column="column1"><?php echo $rows["Reservation_Id"] ?></td>
                <td class="column100 column2" data-column="column2"><?php echo $rows["Name"]?></td>
                <td class="column100 column3" data-column="column3"><?php echo $rows["Email"]?></td>
                <td class="column100 column4" data-column="column4"><?php echo $rows["Contact_No"]?></td>
                <td class="column100 column5" data-column="column5"><center><a href="add.php?appr=<?php echo $rows['Reservation_Id']?>&student=true&add=true;">APPROVE</a></center></td>
                <td class="column100 column6" data-column="column6"><center><a href="process.php?delr=<?php echo $rows['ReserveId']?>">DELETE</a></center></td>

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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


<?php
include'scripts.php';
?>
</body>

</html>

