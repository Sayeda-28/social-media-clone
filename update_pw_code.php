<?php

$conn = mysqli_connect("localhost", "root", "", "netspire");
// storing credentials in the variable below
if (isset($_POST['register-btn'])) 
{
  $users_name = $_POST['username-register'];
  $email = $_POST['email'];
  $pas= $_POST['password'];
  $pas= md5($_POST['password']);
 
  $sql = "SELECT * FROM tbl_register WHERE username_register_db ='$users_name' AND email_db='$email' AND password_register_db='$pas'";
  $res = mysqli_query($conn, $sql);
 
  if(mysqli_num_rows($res) > 0)
  {

	  $users_name= $_POST['username-register'];

	 $email= $_POST['email'];
	 $pas= $_POST['password-new'];
	$pass = md5($pas);  
	 
$change_pass ="UPDATE tbl_register set password_register_db='$pass' where username_register_db ='$users_name' AND email_db='$email'"; //updating password to the new one

  if (mysqli_query($conn, $change_pass)){
   header("location:register.php");
  }

  }
  }
  ?>








