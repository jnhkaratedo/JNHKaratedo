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
		<div class="modal-dialog" role="document">
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
						<div class="col-sm-10">
							<input type="text" class="form-control" id="SearchStudent" placeholder="Student name">
						</div>

					</div>
					<form>
						<div class="table-responsive-sm">
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
  										<input type="checkbox" id="" value="" aria-label="">
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
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	$query = 
	'SELECT * FROM `tblclass` AS `a` 
	LEFT JOIN tblinstructor_info as `b` 
	ON a.Instructor_Id = b.Instructor_id
	WHERE Class_Id ='.$Class_Id;
	$result = mysqli_query($con,$query);
	$class=mysqli_fetch_assoc($result);
	$result = mysqli_query($con,$query);
	?>
	<!-- modal add student end -->
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
								<a href="#" class="btn btn-primary btn-sm">Edit Class</a>
								<a href="#" class="btn btn-danger btn-sm">Delete Class</a>
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


				<div class="table100 ver5 m-b-110" style="align-self: center;">
					<table data-vertable="ver5">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Rank</th>
								<th class="column100 column2" data-column="column2">Name</th>
								<th class="column100 column3" data-column="column3">Gender</th>
								<th class="column100 column4" data-column="column4">Contact</th>
								<th class="column100 column5" data-column="column5">Age</th>
								<th class="column100 column6" data-column="column6"></th>
								<th class="column100 column7" data-column="column7"></th>
								<th class="column100 column8" data-column="column8"></th>

							</tr>
						</thead>
						<tbody>
							<?php
					$query = 
					'SELECT * FROM `tblclass` AS `a` 
					LEFT JOIN tblinstructor_info as `b` 
					ON a.Instructor_Id = b.Instructor_id
					WHERE Class_Id ='.$Class_Id;
					$result = mysqli_query($con,$query);
					$class=mysqli_fetch_assoc($result);
					$result = mysqli_query($con,$query);
					if(mysqli_num_rows($result) > 0){
				
             		
 							   while($rows=mysqli_fetch_assoc($result)){
						    ?>
							<tr class="row100">
								<td class="column100 column1" data-column="column1"></td>
								<td cla ss="column100 column2" data-column="column2"></td>
								<td class="column100 column3" data-column="column3"></td>
								<td class="column100 column4" data-column="column4"></td>
								<td class="column100 column5" data-column="column5"></td>
								<td class="column100 column8" data-column="column8">
									<button name="btnprofile" id="btnprofile" class="btn-icon-text">
										<a href="instructorprofile.php?Class_id=">View
									</button>
								</td>
								<td class="column100 column9" data-column="column9">
									<a name="btnedit2" id="btnedit2" class="btn-icon-prepend" href="add.php?">
										<img src="images/icons/editicon.png" style="height: :9px;width:15px;"></a>
								</td>
								<td class="column100 column10" data-column="column10">
									<a name="btndelete" id="btndelete" class="btn-icon-prepend" href="#">
										<img src="images/icons/deleteicon.png" style="height: :9px;width:15px;">
								</td>
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