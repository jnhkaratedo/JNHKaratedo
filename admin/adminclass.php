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
  <link rel="stylesheet" href="css/fontawesome/css/font-awesome.css"/>
</head>

<body>
  <!-- add class Modal -->
  <div class="modal fade" id="ModalEditClass" tabindex="-1" role="dialog" aria-labelledby="ModalEditClassLabel"
    aria-hidden="true">
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
                <input type="text" class="form-control" id="Class_title" name="Class_title" value=""
                  placeholder="Class Title" required>
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
                <input type="text" class="form-control" id="Class_location" name="Class_location" value=""
                  placeholder="Address" required>
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
  <div class="modal fade" id="DeleteClassModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
    aria-hidden="true">
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
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalEditClass">Add
                Class</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php


$query = 
'SELECT * FROM `tblclass` AS `a`
JOIN tblinstructor_class AS `b`
ON a.`Class_Id` = b.`class_id`
JOIN tblinstructor_info AS `c`
ON b.`instructor_id` = c.`Instructor_Id`
WHERE is_deleted = 0';

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
?>

        <div class="container-fluid table-responsive">
          <table class="table table-striped table-hover table-md">
            <thead class="thead-light ">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Class Title</th>
                <th scope="col">Instructor</th>
                <th scope="col">Location</th>
                <th scope="col">Day</th>
                <th scope="col">Date From</th>
                <th scope="col">Date To</th>
                <th scope="col">Action</th>
                

              </tr>
            </thead>
            <tbody>
              <?php
    while($rows=mysqli_fetch_assoc($result)){
    ?>
              <tr>
                <td><?php echo $rows["Class_Id"];?></td>
                <td><?php echo $rows["Class_title"]?></td>
                <td><?php echo $rows["Name"]?></td>
                <td><?php echo $rows["Location"]?></td>
                <td><?php echo $rows["Day"]?></td>
                <td><?php echo $rows["Date_from"]?></td>
                <td><?php echo $rows["Date_to"]?></td>
                <td>
                  <a class="btn btn-info" href="Class_View.php?Class_id=<?php echo $rows["Class_Id"];?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteClassModal"
                    data-title="<?php echo $rows["Class_title"];?>" data-id="<?php echo $rows['Class_Id'];?>">
                    <i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
    $(document).ready(function () {
      $('#DeleteClassModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var title = button.data('title');
        var id = button.data('id');
        // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text(title);
        modal.find('.modal-body').text("Are you sure you want to delete " + title);
        modal.find('.modal-footer>.btn-danger').attr("href", "deleteclass.php?delete_class=" + id)
      });
    });
  </script>
</body>

</html>