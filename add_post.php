<?php 
session_start();
if(isset($_SESSION['username'])){
 
	}
?>

<?php
$db = mysqli_connect("localhost","root","","netspire");


 $msg = "";
  $msg_class = "";
 if (isset($_POST['save'])) {

    // for the database
    $caption = stripslashes($_POST['caption']);
    $profileImageName = time() . '-' . $_FILES["upload_post"]["name"];
    // For image upload
    $target_dir = "posts_direc/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['upload_post']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
	if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
	//if there are no errors
	 if (empty($error)) {
      if(move_uploaded_file($_FILES["upload_post"]["tmp_name"], $target_file)) { //checking if the file has reached the local directory
        $sql = "INSERT INTO posts (username,post,caption) VALUES ('$_SESSION[username]','$profileImageName','$caption')"; //inserting profile picture ,caption ad the username taken in session variable
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
	  
	header("Location: profile.php"); // after the query excutes, the user wil be redirected to the profile page

exit();
    }
	
  }
  ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="add_post.css ?v=<?php echo time(); ?>">
<link rel="stylesheet" href="normalize.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="pin.css?v=<?php echo time(); ?>">
   <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>
<body>


   <div class="sub-main">
	
	<div class="file-upload">
	 <form enctype="multipart/form-data" method="post">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" name="upload_post" type='file' onchange="readURL(this);" accept="image/*,video/*" />
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <input type="text" class="caption" name="caption" placeholder="Write a caption" >
     <button name="save" type="submit" class="remove-image" >Upload</button>
	</div>
  </div>
   </form>
</div>
</div>
</body>
</html>
<script>
function readURL(input) { //a function that will called when user clicks on the input button
                            // it is used for reding the image URL
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
<script>
//This function will be called once the user selects the picture
//this function displays the picture and a textare for caption
function showMyImage(fileInput) {
 var target=document.getElementById("upload_img_label");


        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
			 var distarget=document.getElementById("modals_pin");   
			 distarget.style.display="block";
            var img=document.getElementById("modal_pin");   
			
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

