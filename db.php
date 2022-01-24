<?php
// Enter your host name, database username, password, and database

 // If you have not set database password on localhost then set

$db = mysqli_connect("localhost","root","","netspire");
if(!$db)
{
 die("Connection failed: " . mysqli_connect_error());
}
else
{
//echo "Database connected successfuly ";
}

?>
<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "netspire";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
else
{
//echo "Database connected successfuly second ";
}
?>



