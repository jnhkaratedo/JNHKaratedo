
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
	$query = 
	'SELECT * FROM `tblclass` AS `a` 
	LEFT JOIN tblinstructor_info as `b` 
	ON a.Instructor_Id = b.Instructor_id
	WHERE Class_Id ='.$Class_Id;
	$result = mysqli_query($con,$query);
	$class=mysqli_fetch_assoc($result);
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
		    <a href="#" class="btn btn-success btn-sm">Add Student</a>
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
			    	<?php echo $class['Name'];?><br/>
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
				<?php
					$result = mysqli_query($con,$query);
					if(mysqli_num_rows($result) > 0){
				?>

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
             }
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
     								<img src="images/icons/deleteicon.png"  style="height: :9px;width:15px;">
     								</td>   
     								</tr>
     						<?php } ?>
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