<!DOCTYPE html>
<html>
<head>
<title>
Social Sprinkle
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />

  <link href="register.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet"> </head>
<body>
<!--- hero div-->
<div class="hero" >
<!---desc div-->
<div class="desc">

<!--- div for logo -->
<div  class="logo"><h1>N</h1> <h2>Netspire</h2></div>
<div class="phone-aboutus">
<div class="smartphone">
<img src="https://images.pexels.com/photos/1262304/pexels-photo-1262304.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
  <div class="content">
  </div>
</div>
<h1 class="ml7">
  <span class="text-wrapper ">
    <span class="letters">Define you..the way you want.</span>
  </span>
</h1>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</div>
</div>
</div>
<div class="form-box">
<div class="button-box">
<div id="btn"></div>
<button type="button" class="toggle-btn" onclick="login()">Log In</button>
<button type="button" class="toggle-btn" onclick="register()">Register</button>
</div>

<?php  
$message = isset($_GET['error']) ? $_GET['error'] : null; // get the error from the url
if(!empty($message)) {  
    echo '<asp:label id="msg" class="text-danger">'.$message.'</label>';  //the message here wil be the one passed from loginform_to_db.php page
} 
else{
$dup_message = isset($_GET['error']) ? $_GET['error'] : null; // get the error from the url 
if(!empty($dup_message)) {  //this variable stored the message of "username already exists""
    echo '<asp:label id="msg" class="text-danger-dup">'.$dup_message.'</label>';  
} }?>


<form  id="login"class="input-group" action="loginform_to_db.php"  method="post">
<input type="text" class="input-field" name="username" placeholder="Enter your username" required>
<input  class="input-field" type="password" name="password" placeholder="Enter Password" required>

<button type="submit" class="submit-btn" name="login-btn">Log in</button>
<a href="update_pw.php" class="reset-pass"> Reset Password </a>
</form>
<form id="register" class="input-group" action="registerform_to_db.php"  method="post">
<input type="text" class="input-field" name="email" placeholder="Enter email" required>
<input type="text" class="input-field" name="username-register" placeholder="Enter username" required>

<input  class="input-field" type="password" name="password-register"placeholder="Enter Password" required>

<button type="submit" class="submit-btn" name="register-btn">Register</button>
</form>
</div>
</div>
<!---js code for adjusting the postion of the two forms using the buttons-->
<dive class="hero-2"></div>
</body>
</html>
<script>
var x = document.getElementById ("login");
var y = document.getElementById("register");
var z = document.getElementById ("btn");
function register (){
x.style.left = "400px";
y.style.left = "50px";
z.style.left="110px";}
function login(){
x.style.left = "50px";
y.style.left="450px";
z.style.left="0px";
}

</script>

<script>

// Wrap every letter in a span
//used for displaying the vanishing text
var textWrapper = document.querySelector('.ml7 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml7 .letter',
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 750,
    easing: "easeOutExpo",
    delay: (el, i) => 50 * i
  }).add({
    targets: '.ml7',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });

</script>
<script type="text/javascript">
 //This function will hide the messages displayed for user about wrong credentials
       function HideLabel()
	   { var seconds = 5; setTimeout(function () 
	   { document.getElementById("<%=msg.ClientID %>").style.display = "none"; }, 
	   seconds * 1000); }; </script> <!--For hiding Alert Message After 5 second using JavaScript -->
};  
		</script>