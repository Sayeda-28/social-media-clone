<?php 
session_start();
if(isset($_SESSION['username'])){

	}
	
	
	?>
	<?php
	
	 $conn = mysqli_connect("localhost", "root", "", "netspire"); //connecting to database
			if (isset($_POST['postcomment'])) // if the comment is submitted
			{
			
			$comment= $_POST['comment-form']; // take value of the input type text in this variable
		

	             $comme = "INSERT INTO comments (com,post_id) VALUES ('$comment','".$_GET["id"]."')"; //insert comment and post id taken from the post itself in  table comment
		     if (mysqli_query($conn, $comme))
                  {
                  // echo "New record created successfully !";
				  
                  }
				  else{
				  echo "problem";
				  }
		   }
		   
		   
	?>
	 <div  id="add-comment" class="add-bio">
 <?php

    $conn = mysqli_connect("localhost", "root", "", "netspire"); //connect databse
// Fetch image from databases
	$com = mysqli_query($conn, "SELECT DISTINCT com FROM comments WHERE post_id='" . $_GET["id"] . "'"); //select comment from table comment where the post id is the one with whihc it was entered i.e, taken from the comment button
	
	 echo'<div  class="comment-display"> ';
     while ($row = mysqli_fetch_array($com)) {  // display comment one by one
	
    ?>
		
      	<?php 
		
		echo' <p>' .$row['com']. '</p> </br>'; 	
		
		?>
		
     
  <?php }
  echo'</div>';
  ?>
  <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="add_post.css ?v=<?php echo time(); ?>">
<link rel="stylesheet" href="normalize.css ?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="comment.css?v=<?php echo time(); ?>">
   <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

<title>
</title>
</head>
<body>

	 <div  id="add-bio" class="add-bio">
 <form method="post" class="comment-form">
            <textarea name="comment-form" class="bioin" placeholder="Write Your comment Here" required></textarea>
			<button  id ="submit" name="postcomment" type="submit"> submit</button>
			
			</form>
			<div  class="back-btn"  id ="bio-back" name="back"><a href="index.php" style="text-decoration:none; color:white"> Back</a></div>
          </div>
		
	


          
          
		  </body>
		  </html>
		  
			


