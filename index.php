<?php
include 'navbar.php';
?>
<?php 
session_start();
if(isset($_SESSION['username'])){

	}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

<link rel="stylesheet" href="homepage.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="pin.css?v=<?php echo time(); ?>">
   <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<title>
</title>
</head>
<body>
<div class="post-view">
	
	<?php
    $conn = mysqli_connect("localhost", "root", "", "netspire");
// Fetch all posts from database from databases
	$img = mysqli_query($conn, "SELECT * FROM posts");
	
     while ($row = mysqli_fetch_array($img)) {  
	

           
           

    ?>
		<div class="inner">
      	<?php echo "<img src='posts_direc/".$row['post']."' >"; 

		echo'<div class="caption-stuff">';?>
		<a href="otheruser.php?username=<?php echo $row["username"];?>" class="mydiv123"><?php echo $row['username'] ?></a> <!--taking username as a refernce through get method to show the user page-->
		<?php echo'<p class="mydiv">' .$row['caption']. '</p>'; ?>
		<a   href="comment.php?id=<?php echo $row["id"];?>" class="comment-icon"><i class="fas fa-comment-dots" style="border:none;font-size:25px;background:none;color: #B85C38;"></i></a>
		<?php
		echo'</div>';?>
		</div>
     
  <?php  }


   
		   
		 
	?>

		

		 

</body>
</html>

   