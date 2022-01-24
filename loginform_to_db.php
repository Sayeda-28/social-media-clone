<?php
session_start();

$db = mysqli_connect("localhost","root","","netspire");
if(!$db)
{
 die("Connection failed: " . mysqli_connect_error());
}
else
{
//echo "Database connected successfuly ";
}
if(isset($_POST["username"], $_POST["password"])) 
    {     

       $username = stripslashes($_POST["username"]); 
$username = mysqli_real_escape_string($db,$_POST["username"]);

$password = stripslashes($_POST["password"]); 
$password = mysqli_real_escape_string($db,$_POST["password"]); 
$password=md5($password); // mking sure the password encrypted with md5 is the same as the one in login

  $result1 = mysqli_query($db,"SELECT username_register_db, password_register_db,id FROM tbl_register WHERE username_register_db = '".$username."' AND  password_register_db = '".$password."'");

if(mysqli_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
			$_SESSION['user_id']=$id;
			$_SESSION['username']=$username;
			
            header("Location: index.php");
  exit;
        }
        else
        {  
		$message = '<label>Username or password is incorrect</label>'; 
header("location:register.php?error=" . urlencode("Username or password is incorrect"));
		}
}?>
<?php
include "register.php";
?>
