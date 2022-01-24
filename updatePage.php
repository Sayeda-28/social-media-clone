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
   if(mysqli_query($db, $sql)){
   //echo "success";
   }
   else{
   echo"problem";
   }
		}  
		
		  ?>
		
 
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<link rel="stylesheet" href="updatePage.css ?v=<?php echo time(); ?>">
<script src="https://kit.fontawesome.com/ff8aa00b8d.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

</head>

<html>
<body>
<div class="container">
<div class="main-one">
<div class="profile_pic">
 <?php
  $db = mysqli_connect("localhost","root","","netspire");

   


  $results = mysqli_query($db, "SELECT profile_img FROM profile_image  WHERE username='$_SESSION[username]'");
 $rows=mysqli_fetch_array($results);
   $img = $rows['profile_img'];


  $bio_results = mysqli_query($db, "SELECT bio FROM profile_image  WHERE username='$_SESSION[username]'");
 $biorows=mysqli_fetch_array($bio_results);
$bio = $biorows['bio'];
  ?>
    
  <img style="background-color:white" src="dp_images/<?php echo $img?>" alt="PROFILE PHOTO" id="photo">;
	</div>
	<div class="bio">
	<h4 >Bio:</h4>
	  <p style="margin:10px"><?php echo $bio?> </p>
	  <button  onclick="showDiv()" class="change-bio">Update Bio</button>
	  </div>
	<button  onclick="location.href = 'profile_img_uopload.php';" class="change-dp" >Change Profile Photo</button>
</div>
<div class="main-two">
<div class="username">
	<h4 >Username:</h4>
	  <p style=""><?php echo $_SESSION['username'] ?> </p>
	  <button  onclick="showDivUser()" class="change-username">Logout</button>
	  </div>
	 <div class="delete">
	  <button  class="delete-acc"><a style="text-decoration:none;color:white" href="update_pw.php">Reset password</a></button>
	  </div>
	  
</div>

	
	 


<div  id="add-bio" class="add-bio">
 <form method="post" >
            <textarea name="bio-form" class="bioin" placeholder="Write Your Bio Here"></textarea>
			<button  id ="submit" name="submitbio" type="submit"> submit</button>
			<button  id ="bio-back" > Back</button>
			</form>
          </div>
 <div  id="add-username" class="add-username">
 <form method="post" action="logout.php">
           	<p style="color:white">(You will be redirected to Login Page)</p>
			<button  id ="submit" name="logout" type="submit"> Logout</button>
			
		
			</form>
			<button onclick="hideDivUser()" id ="bio-back" > Back</button>
          </div>
		  <div  id="delete-user" class="delete-user">
 <form method="post" >
           	<p style="color:white">Do you want to delete your account?</p>
			
			<button  id ="bio-back" type="submit" name="delete-account">Yes</button>
			<button  id ="submit"  type="submit"> No</button>
		
			</form>
          </div>
	
</body>
</html>
<script>

 function showDiv(){
   document.getElementById('add-bio').style.display = "block";
   }
function hideDiv(){
   document.getElementById('add-bio').style.display = "none";
}
function showDivUser(){
   document.getElementById('add-username').style.display = "block";
}
function hideDivUser(){
   document.getElementById('add-username').style.display = "none";
}
function showDivDel(){
   document.getElementById('delete-user').style.display = "block";
}
function hideDivDel(){
   document.getElementById('delete-user').style.display = "none";
}


</script>