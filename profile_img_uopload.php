<?php 
session_start();
if(isset($_SESSION['username'])){

	}

?>

<?php
$db = mysqli_connect("localhost","root","","netspire");

$msg = "";
  $msg_class = "";
 if (isset($_POST['submit'])) {

    // for the database
    //$bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["upload_img"]["name"];
    // For image upload
    $target_dir = "dp_images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['upload_img']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
	if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
	 if (empty($error)) { //iif no errors are found
      if(move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) { //if the file ha sreached the local directory
        $sql = "UPDATE profile_image SET profile_img='$profileImageName' WHERE username='$_SESSION[username]'"; //update table and insert the image taken from form
        if(mysqli_query($db, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
	header("Location: profile.php"); //if the image is uplaoded successfully ,head to profile page
exit();
  }
  if (isset($_POST['back'])){ //if back buttonis clicked in the form
  header("Location: profile.php");  //head to profile page
  }
  ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="profile_img_upload.css ?v=<?php echo time(); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

<title>
</title>
</head>
<body>

<div class="preview" >   

<form enctype="multipart/form-data" method="post" >

      <input class="custom-file-input" accept="image/*" onchange="showMyImage(this)"  type="file" name="upload_img" id="upload_img">			
	 
	 <div class="main">
		<img id="thumbnil"  src="" width="150px" height="250px"/>
		 
		  <button  class="button_dpupload"   id="backBtn" name="back"> Back</button>
		 <button   class="button_dpupload"  id="uploadDpBtn" name="submit" type="submit" >upload</button>
					
	</form>

					
</div>
</body>
</html>

<script>
//function for previewing selected image before upload
 function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");            
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }
</script>