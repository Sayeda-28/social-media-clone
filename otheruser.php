<?php 
session_start(); //start session 
if(isset($_SESSION['username'])){ //just checking if the variable is set

	}

?>
<?php
include 'navbar.php'; //include the navigation bar fron nav.php page
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

<link rel="stylesheet" href="normalize.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="pin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="modal.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="final_board.css?v=<?php echo time(); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <link href="profile.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet">
<script src="https://kit.fontawesome.com/ff8aa00b8d.js" crossorigin="anonymous"></script>


</head>
<body>


<div class="main_profile_info">
<div class="bio" id="bio_id">

   <div class="profile_pic" class="inner" id="profile-pic">
   <!--php tags for fetching user info-->
  <?php
  $db = mysqli_connect("localhost","root","","netspire");

  $results = mysqli_query($db, "SELECT profile_img FROM profile_image  WHERE username='" . $_GET["username"] . "'"); //select profile image from record where username is the one taken from url through get method
 $rows=mysqli_fetch_array($results);
$img = $rows['profile_img'];
  $bio_results = mysqli_query($db, "SELECT bio FROM profile_image  WHERE username='" . $_GET["username"] . "'"); //select bio of the user from profile_image table
 $biorows=mysqli_fetch_array($bio_results);
$bio = $biorows['bio'];
 $user_results = mysqli_query($db, "SELECT username FROM profile_image  WHERE username='" . $_GET["username"] . "'"); //select bio of the user from profile_image table
 $userrows=mysqli_fetch_array($user_results);
$user = $userrows['username'];
 ?>
    
  <img style="background-color:white"src="dp_images/<?php echo $img?>" alt="PROFILE PHOTO" id="photo">;
	
       <!-- <input type="file" id="file">-->
          
      </div>

         <div class="username_in_profile"  class="inner">
		     <h4>Username:</h4>
          <p><?php echo $user ; ?><p> <!--display username here -->
           </div>
             <div class="bio_info_para"  class="inner">
			 <h4 style="margin-top:20px">Bio</h4>
                   <p style="color: #5d1e03; font-weight:bolder; margin-bottom:20px;"><?php echo $bio?></p><!--display bio here -->
           </div>
             </div>

</div>
<div class="gallery-ga"> Gallery </div>



<div class="post-view">
	
	<?php
    $conn = mysqli_connect("localhost", "root", "", "netspire");
// Fetch posts from database
	$img = mysqli_query($conn, "SELECT * FROM posts WHERE username='" . $_GET["username"] . "'");

     while ($row = mysqli_fetch_array($img)) {//using while loop to fetch all the rows     ?>
		<div class="inner">
      	<?php echo "<img src='posts_direc/".$row['post']."' >"; //display post image
		echo'<div class="caption-stuff">'; //a separate div for caption and comment and delete icons
		echo'<p class="mydiv">' .$row['caption']. '</p>';  //display caption
		echo'<p  style="display:none" class="mydiv">' .$row['id']. '</p>'; ?>
		<a   href="comment.php?id=<?php echo $row["id"]; ?>" class="comment-icon"><i class="fas fa-comment-dots" style="border:none;font-size:25px;background:none;color: #B85C38;"></i></a> <!--taking post id ina variable through get method and redirecting the user to the comment.php page-->
		
		<?php echo'</div>';?>
		</div>
     
  <?php  }
	?>

</div>
</body>
</html>


