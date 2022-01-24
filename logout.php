<?php
session_start();
if(isset($_SESSION['username'])){

	}
	

  
  //once the logout button is clicked the user will be redirected here
session_destroy();   //destroy all sessions 
header("Location: register.php");//use for the redirection to some page  


?>
