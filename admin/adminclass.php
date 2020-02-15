<?php 
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>JNH-Karatedo Admin</title>
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<!-- add class Modal -->
<div class="modal fade" id="ModalEditClass" tabindex="-1" role="dialog" aria-labelledby="ModalEditClassLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditClassLabel">Create Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
	  <form action="addclass.php" method="post">
	  <div class="row">
	  
				<div class="form-group col-12">
					<label for="Class_title">Class Title</label>
					<input type="text" class="form-control" id="Class_title" name="Class_title" value="" placeholder="Class Title" required>
				</div>
        <div class="form-group col-12">
        <label for="inputState">State</label>
        <select id="ClassInstructor" name="ClassInstructor" class="form-control" required>
        <option>Choose instructor</option>
        <?php 
          // get instructors
          $getquery = "Select * from tblinstructor_info";
          $getqueryres = $con->query($getquery);
          if ($getqueryres->num_rows > 0) {
            // output data of each row
            while($row = $getqueryres->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['Instructor_Id'];?>"><?php echo $row['Name']?></option>
            <?php }
          } else {
            echo "<option>empty</option>";
          }
          ?>


          

          
        </select>
        </div>
				<div class="form-group col-12">
					<label for="Class_location">Location</label>
					<input type="text" class="form-control" id="Class_location" name="Class_location" value="" placeholder="Address" required>
				</div>
				<div class="form-group col-6">
					<label for="Date_to">Date from</label>
					<input type="Date" class="form-control" id="Date_from" name="Date_from" value="" required>
				</div>
				<div class="form-group col-6">
					<label for="Class_location">Date to</label>
					<input type="Date" class="form-control" id="Date_to" name="Date_to" value="" required>
				</div>
		
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- add class modal -->

<!-- delete class modal -->
<div class="modal fade" id="DeleteClassModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-warning text-light">
      <div class="modal-header">
        <h5 class="modal-title " id="DeleteModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<!-- delete class modal -->
  <?php include'_navbar.php'; ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">CLASS LIST</h4>
            </div>
            <div>
            <button type="button" class="btn btn-primary btn-sm" 
								data-toggle="modal" data-target="#ModalEditClass">Add Class</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php


$query = 
'SELECT * FROM `tblclass` AS `a` 
LEFT JOIN tblinstructor_info as `b` 
ON a.Instructor_Id = b.Instructor_id where is_deleted = 0';
$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
?>

        <div class="table100 ver5 m-b-110" style="align-self: center;">
          <table data-vertable="ver5">
            <thead>
              <tr class="row100 head">
                <th class="column100 column1" data-column="column1">Id</th>
                <th class="column100 column2" data-column="column2">Class Title</th>
                <th class="column100 column3" data-column="column3">Instructor</th>
                <th class="column100 column4" data-column="column4">Location</th>
                <th class="column100 column5" data-column="column5">Day</th>
                <th class="column100 column6" data-column="column6">Date From</th>
                <th class="column100 column7" data-column="column7">Date To</th>
                <th class="column100 column8" data-column="column8"></th>
                <th class="column100 column9" data-column="column9"></th>

              </tr>
            </thead>
            <tbody>
              <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
              <tr class="row100">
                <td class="column100 column1" data-column="column1"><?php echo $rows["Class_Id"];?></td>
                <td class="column100 column2" data-column="column2"><?php echo $rows["Class_title"]?></td>
                <td class="column100 column3" data-column="column3"><?php echo $rows["Name"]?></td>
                <td class="column100 column4" data-column="column4"><?php echo $rows["Location"]?></td>
                <td class="column100 column5" data-column="column5"><?php echo $rows["Day"]?></td>
                <td class="column100 column6" data-column="column6"><?php echo $rows["Date_from"]?></td>
                <td class="column100 column7" data-column="column7"><?php echo $rows["Date_to"]?></td>
                <td class="column100 column8" data-column="column8">
                  
                    <a class="btn btn-info" href="Class_View.php?Class_id=<?php echo $rows["Class_Id"];?>">View</a>
                  
                </td>
                <td class="column100 column10" data-column="column10">
                
                  <button type="button" data-toggle="modal" data-target="#DeleteClassModal" data-title="<?php echo $rows["Class_title"];?>" data-id="<?php echo $rows['Class_Id'];?>">
                  <img src="images/icons/deleteicon.png" style="height: :9px;width:15px;"></button>
                  <!-- <a name="btndelete" id="btndelete" class="btn-icon-prepend"
                    href="deleteclass.php?delete_class="> -->
                    
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

  <script>
  $(document).ready(function(){
		$('#DeleteClassModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var title = button.data('title');
    var id = button.data('id');
    // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text(title);
		modal.find('.modal-body').text("Are you sure you want to delete " + title );
    modal.find('.modal-footer>.btn-danger').attr("href", "deleteclass.php?delete_class=" + id)
		});
	});
  </script>
</body>

</html>