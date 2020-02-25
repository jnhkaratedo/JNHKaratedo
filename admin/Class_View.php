<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>JNH-Karatedo Admin</title>
	<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
</head>

<body>
	<?php include'_navbar.php'; 
	require_once('connection.php');
	$Class_Id = $_GET['Class_id'];
	
  ?>
	<!-- modal add student start-->
	<!-- Modal -->
	<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addStudentModalLabel">Add Students</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group row">
						<label for="SearchStudent" class="col-sm-2 col-form-label">Search</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="SearchStudent" placeholder="Student name">
						</div>

					</div>
					<form action="classaddStudent.php?Class_id=<?php echo $_GET["Class_id"]?>" method="post">
						<div class="table-responsive">
							<table class="table">
								<thead style="color:#fff;">
									<tr>
										<th class="col"></th>
										<th class="col">Rank</th>
										<th class="col">Name</th>
										<th class="col">Gender</th>
										<th class="col">Contact</th>
										<th class="col">Age</th>
									</tr>
								</thead>

								<tbody>
								<?php
								$addstudentquery =
								'SELECT * from tblstudent_info as a left outer join tblstudentclass as b on a.Student_Id = b.Student_id where b.Class_Id IS NULL';

								$availableStudents = mysqli_query($con,$addstudentquery);
								//$availableStudents=mysqli_fetch_assoc($availableStudents);
								//var_dump($availableStudents);
								if(mysqli_num_rows($availableStudents) > 0){
								while($rows=mysqli_fetch_assoc($availableStudents)){
								?>
									<tr>
										<td class="">
  										<input type="checkbox" name="Student_Id[]" value="<?php echo $rows["Student_Id"]?>" aria-label="">
										</td>
										<td class=""><?php echo $rows["Rank"];?></td>
										<td class=""> <?php echo $rows["Name"];?> </td>
										<td class=""> <?php echo $rows["Gender"];?> </td>
										<td class=""> <?php echo $rows["Contact_No"];?> </td>
										<td class=""> <?php echo $rows["Age"];?> </td>
									</tr>
									<?php
									}
								}
								?>
								</tbody>
							</table>
						</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- modal add student end -->
	



<!-- edit class Modal -->
<div class="modal fade" id="ModalEditClass" tabindex="-1" role="dialog" aria-labelledby="ModalEditClassLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalEditClassLabel">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	
	  <form action="editclass.php?Class_id=<?php echo $_GET['Class_id']?>" method="post">
	  <div class="row">
	  <?php 
		//  $editquery = 
		//  "UPDATE tblclass SET Class_title=value, Location=value2, Date_from=value3, Date_to=value4,Day=value5,
		//  WHERE Class_Id=value"
		$getclassquery= "Select * from tblclass where Class_Id=".$_GET['Class_id'];

		$getclassres = $con->query($getclassquery);
		if ($getclassres->num_rows > 0) {
			// output data of each row
			while($row = $getclassres->fetch_assoc()) {
			
			 ?>
				<div class="form-group col-12">
					<label for="Class_title">Class Title</label>
					<input type="text" class="form-control" id="Class_title" name="Class_title" value="<?php echo $row['Class_title']?>" placeholder="Class Title">
				</div>
				<div class="form-group col-12">
					<label for="Class_location">Location</label>
					<input type="text" class="form-control" id="Class_location" name="Class_location" value="<?php echo $row['Location']?>" placeholder="Address">
				</div>
				<div class="form-group col-6">
					<label for="Date_to">Date from</label>
					<input type="Date" class="form-control" id="Date_from" name="Date_from" value="<?php echo $row['Date_from']?>">
				</div>
				<div class="form-group col-6">
					<label for="Class_location">Date to</label>
					<input type="Date" class="form-control" id="Date_to" name="Date_to" value="<?php echo $row['Date_to']?>" >
				</div>
			<?php }
		} else {
			echo "0 results";
		}

	  ?>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- edit class modal -->

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
        Are you sure you want to delete this class?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="deleteclass.php?delete_class=<?php echo $_GET["Class_id"];?>" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
<!-- delete class modal -->

	<?php
	$query = 
	'SELECT * FROM `tblclass` AS `a`
	JOIN tblinstructor_class as `b`
	ON a.`Class_Id` = b.`class_id`
	join tblinstructor_info as `c`
	on b.`instructor_id` = c.`Instructor_Id`
	where is_deleted = 0 and a.Class_Id ='.$Class_Id;
	$result = mysqli_query($con,$query);
	$class=mysqli_fetch_assoc($result);
	$result = mysqli_query($con,$query);
	?>
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="container m-2">
				<div class="row">
					<div class="col-md-8 d-flex">
						<div class="card flex-fill">
							<div class="card-header">
								View Class
							</div>
							<div class="card-body">
								<h3 class="display-1">
									<?php 
									echo $class['Class_title'];
									?>

								</h3>
								<p class="card-text lead">
									<?php echo 'From '.$class['Date_from'].' to '.$class['Date_to'];?>
								</p>
								<p>
									<em><?php echo $class['Day']?></em>
								</p>
								<p class="card-text">
									<?php echo $class['Location'];?>
								</p>
								<button type="button" data-toggle="modal" data-target="#addStudentModal"
									class="btn btn-success btn-sm">Add Student</button>
								<button type="button" class="btn btn-primary btn-sm" 
								data-toggle="modal" data-target="#ModalEditClass">Edit Class</button>
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteClassModal">Delete Class</button>
							</div>
						</div>
					</div>
					<div class="col-md-4 d-flex">
						<div class="card flex-fill" style="width: 18rem;">
							<img class="card-img-top" src="images/cyh.jpg" alt="Card image cap">
							<div class="card-body">
								<p class="card-text text-center">
									<?php echo $class['Name'];?><br />
									Instructor
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 grid-margin">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h4 class="font-weight-bold mb-0">CLASS LIST</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row">


				<div class="col-12 table-responsive-sm">
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr class="">
								<th class="col">Name</th>
								<th class="col">Rank</th>
								<th class="col">Gender</th>
								<th class="col">Contact</th>
								<th class="col">Age</th>
							</tr>
						</thead>
						<tbody>
							<?php
					$query = 
					'SELECT * FROM `tblstudent_info` AS `a` 
					LEFT JOIN `tblstudentclass` as `b` 
					ON a.Student_Id = b.Student_id
					WHERE Class_Id ='.$Class_Id;
					$result = mysqli_query($con,$query);
					$class=mysqli_fetch_assoc($result);
					$result = mysqli_query($con,$query);
					if(mysqli_num_rows($result) > 0){
				
             		
 							   while($rows=mysqli_fetch_assoc($result)){
						    ?>
							<tr class="row100">
								<td><?php echo $rows['Name'];?></td>
								<td> <?php echo $rows['Rank'];?> </td>
								<td><?php echo $rows['Gender'];?></td>
								<td><?php echo $rows['Contact_No'];?></td>
								<td><?php echo $rows['Age'];?></td>
								
							</tr>
							<?php }
						} ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php include'_footer.php'; ?>
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