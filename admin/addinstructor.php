<?php
if(session_status()!=PHP_SESSION_ACTIVE) {
    session_start();
  }
  if($_SESSION['username']!=true){
      header('Location:login.php');
      die();
  }
require_once('connection.php');

if(isset($_POST["instrName"])){


//prepare data to be inserted into tblinstructor_info
$rank = $_POST["instrRank"];
$name = $_POST["instrName"];
$address = $_POST["instrAddress"];
$gender = $_POST["instrGender"];
$contact_no = $_POST["instrContact"];
$email = $_POST["instrEmail"];

$birthday = $_POST["instrBday"];
    //adding age
    $date = date('Y-m-d');
    $date = new DateTime($birthday);
    $now = new DateTime();
    // get the difference of the date of bday to date now
    $age = $now->diff($date);
    // get the result year by getting the object 'Y'
$age = $age->y;
$image = $_FILES['instrImage']['name'];


// validate if user is already existing
$sql = "SELECT Name, Email FROM tblinstructor_info WHERE Name='".$name."' && Email = '".$email."'";

$result = $con->query($sql);
// if there is a match. go back to previous page and status that there is an existing data with the same name and email.
if ($result->num_rows > 0) {
    $_SESSION["status"] = "Instructor already existing with same name and email";
    $data_exist = true;
    
    header('Location:admininstructor.php?insert=failed');
} else {
    $data_exist=false;
}

// Check if image file is a actual image or fake image
if(isset($_FILES["instrImage"])&&$data_exist==false) {
    $target_dir = "images/uploads/instructor/";
    $target_file = $target_dir . basename($_FILES["instrImage"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;
    $check = getimagesize($_FILES["instrImage"]["tmp_name"]);
    if($check !== false) {
        $upload_Status = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $upload_Status = "File is not an image.";
        $uploadOk = 0;
    }
    // // Check if file already exists
    if (file_exists($target_file)){
        $upload_Status = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // // Check file size
    if ($_FILES["instrImage"]["size"] > 2500000) {
        $upload_Status ="Sorry, your file is too large.";
        $uploadOk = 0;
    }
        // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $upload_Status ="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
        // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_Status ="Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["instrImage"]["tmp_name"], $target_file)) {
            $upload_Status = "The file ". basename( $_FILES["instrImage"]["name"]). " has been uploaded.";
        } else {
            $upload_Status = "Sorry, there was an error uploading your file.";
        }
    }
 }
 
 if($data_exist==false){
            // prepare and bind
            $stmt = $con->prepare("INSERT INTO tblinstructor_info (Rank, Name, Address, Birthday, Age, Gender, Contact_No, Email,image ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if(
            //bind the data
            $stmt->bind_param("ssssisiss", $rank, $name, $address, $birthday,$age,$gender,$contact_no,$email,$image) &&
            $stmt->execute()
            ){
                header('Location:admininstructor.php?insert=success&&uploadstatus='.$upload_Status);
                
            }else{
                $insert_Status = $mysqli ->error;
                header('Location:admininstructor.php?insert='.$insert_Status.'&&uploadstatus='.$upload_Status);
            }

  }

}



?>