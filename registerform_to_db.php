<?php
include_once 'db.php';
if(isset($_POST['register-btn']))
{

$email = ($_POST["email"]);  
//storing the credentials taken from register form
$username= $_POST["username-register"];
$password =$_POST["password-register"]; 
$password= md5($password); // for sql injection protection
$dup_message=mysqli_query($conn,"select * from tbl_register where username_register_db='$username' or email_db='$email'");//selecting all rows from 
if (mysqli_num_rows($dup_message)>0)
{
     header("Location: register.php?error=" . urlencode("Username or email already exists"));
      }
       else{
          $sql = "INSERT INTO tbl_register
             (email_db,username_register_db,password_register_db)VALUES('$email','$username','$password')"; //inserting credentials into register table
             if (mysqli_query($db, $sql))
                  {
                   // echo "New record created successfully !";
                  }
                        else
                            {
                               echo "Error: " . $sql . " " . mysqli_error($db);
                            }   
							
                                    $sql2 = "INSERT INTO profile_image (username) VALUES ('$username')"; //inserting username into profile)imag table
                                    if(mysqli_query($db,$sql2))
                                       {
                                       //echo "New record created successfully !";
                                       }
                                          else
                                            {
                                                      echo "Error: " . $sql2 . " " . mysqli_error($db);
                                            }        
                                                       
                                                                mysqli_close($db);
		  }

}

                                                                

?>
<?php
    include "register.php";
?>