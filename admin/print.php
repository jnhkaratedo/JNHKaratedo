<!DOCTYPE html>
<?php
	require_once('connection.php');
if(isset($_GET['id'])){
$id=$_GET['id'];
$query = "SELECT * FROM tblstudent_info where Student_Id=$id";
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html lang="en">
<head>
	
</head>
<body>
	<div style="float: middle;">
	<center><h1>JNH_SSKUP Karatedo/Kobudo</h1>
	<label>JNH-PKMAS-SKP Karatedo/kobudo Humbo Dojo <br> Blk 5 Lot 11 Rosa I Subdivision<br>Brgy. United Bayanihan, City of San Pedro, Laguna<br>Email: <span>jimbohernandez703@yahoo.com</span><br>Facebook:<span>jnhkaratedo@yahoo.com</span><br>09223913836-sun/09156922342-globe</label></center>
	</div>
	<br>
	<br>

	<div>
		<label style="float: right;"> Date: <?php echo date("Y-m-d");?> </label><br>
		<label style="border:1px; padding: 20px;">Rank:<?php echo $row['Rank']?></label><br>
		<label style="border:1px; padding: 20px;">Name:<?php echo $row['Name']?></label><br>
		<label style="border:1px; padding: 20px;">Address:<?php echo $row['Address']?></label><br>
		<label style="border:1px; padding: 20px;">Birthday:<?php echo $row['Birthday']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Age:<?php echo $row['Age']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Gender:<?php echo $row['Gender']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Contact_No:<?php echo $row['Contact_No']?></label>&nbsp<br>
		<label style="border:1px; padding: 20px;">Father's Name:<?php echo $row['Fathers_Name']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Occupation:<?php echo $row['FOccupation']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Contact_No:<?php echo $row['FContact_No']?></label><br>
		<label style="border:1px; padding: 20px;">Mother's Name:<?php echo $row['Mothers_Name']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Occupation:<?php echo $row['MOccupation']?></label>&nbsp
		<label style="border:1px; padding: 20px;">Contact_No:<?php echo $row['MContact_No']?></label>&nbsp<br>
		<label>Have you joined other Martial Ats? If yes, What Club, Style, Rank and Nameof Previous Instructor? <br><?php echo $row['Comment'];?></label>	
	</div>
	<hr>
	<div>
		<?php if($row['Age']>17){?>
		<center><h2 >WAIVER<SPAN STYLE="color:red;"> (HARMONY VILLAGE MALL)</SPAN></h2></center>
		<br>
		<p>
			Ako si <?php echo $row['Name'];?>, at nasa wastong gulang at nakatira sa <?php echo $row['Address'];?>, ay kusang loob na sumasali at pinatutunayan ko na ako ay nasa wastong pangangatawan at pag-iisip upang sumailalim sa nasabing pagsasanay. Dahil dito, aking nauunawan na walang pananagutan ang ga organizer at namumuna sa <b>JNH-SSKUP KARATEDO/KOBUDO CLUB</b> kung sakaling ako ay masaktan o magkaroon ng kapansanan habng ako ay nagsasanay. Ang mga organizer at namumuno ay walang pananagutan sa anumang gastos o danyos na matatamo ng sinomang kalahok kung sakali mang magka-aksidente o makatamo ng sugat o anu mang sakit dahil sa pagsali sa <b>KARATE TRAINING</b>. Nilagdaan ngayong ika-<?php echo date("d");?> ng <?php echo date("m");?> taong <?php echo date("y");?>.

		</p>
	<?PHP }else{?>
	<center><h2 >WAIVER<SPAN STYLE="color:red;"> (HARMONY VILLAGE MALL)</SPAN></h2></center>
		<br>
		<p>
			Ako si <?php echo $row['Name'];?>, at nasa wastong gulang at nakatira sa <?php echo $row['Address'];?>, ay kusang loob na sumasali at pinatutunayan ko na ako ay nasa wastong pangangatawan at pag-iisip upang sumailalim sa nasabing pagsasanay. Dahil dito, aking nauunawan na walang pananagutan ang ga organizer at namumuna sa <b>JNH-SSKUP KARATEDO/KOBUDO CLUB</b> kung sakaling ako ay masaktan o magkaroon ng kapansanan habng ako ay nagsasanay. Ang mga organizer at namumuno ay walang pananagutan sa anumang gastos o danyos na matatamo ng sinomang kalahok kung sakali mang magka-aksidente o makatamo ng sugat o anu mang sakit dahil sa pagsali sa <b>KARATE TRAINING</b>. Nilagdaan ngayong ika-<?php echo date("d");?> ng <?php echo date("m");?> taong <?php echo date("y");?>.

		</p>
		<?php }?>
	</div>

	<center><button id="btnprint" onclick="PrintPage()">Print</button><button><a href="adminstudent.php" class="btn btn-primary">Cancel</a></button></center>
</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
</script></html>
<?php 
	}
?>