<?php
session_start();
if(isset($_SESSION['username'])){

	}
include 'navbar.php';

?>
<?php
		  
$db = mysqli_connect("localhost","root","","netspire");
		  if(isset($_POST['submitbio']))
{
  $bio= ($_POST['bio-form']);
  $sql = "UPDATE profile_image SET bio='$bio' WHERE username='$_SESSION[username]'";

		}  
		
		  ?>
 
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<link rel="stylesheet" href="bioUpdate.css ?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/ff8aa00b8d.js" crossorigin="anonymous"></script>
</head>
<html>
<body>
<div  id="add-bio"class="add-bio">
 <form method="post" >
            <textarea name="bio-form" class="bioin" placeholder="Write Your Bio Here"></textarea>
			<input type="submit" name="submitbio" placeholder="add" >
			<button  id ="bio-back" > Back</button>
			</form>
          </div>
		 

</body>
</html>