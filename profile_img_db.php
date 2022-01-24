<?php


$db = mysqli_connect("localhost","root","","netspire");
 $msg = "";
  $msg_class = "";
 if (isset($_POST['submit'])) {
    // for the database
    $bio = stripslashes($_POST['bio']);
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
	 if (empty($error)) {
      if(move_uploaded_file($_FILES["upload_img"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO profile_image SET profile_img='$profileImageName', bio='$bio'";
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
  }
?>