<?php

   $conn = mysqli_connect("localhost", "root", "", "netspire"); //conecting databse

$sql = "DELETE FROM posts WHERE id='" . $_GET["id"] . "'"; //delete the post from table posts where post id is the one taken from the delete button
if (mysqli_query($conn, $sql)) { //if the query runs well
 echo "<script>alert('Post deleted successfully')</script>"; 
 
} else {
 echo "<script>alert('Error deleting record')<script> " . mysqli_error($conn);
}

mysqli_close($conn);
header("location: profile.php"); //head to page profile
?>