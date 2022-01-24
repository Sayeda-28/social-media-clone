<!DOCTYPE html>
<html>
<head>
<link href="update_pw_style.css?v=<?php echo time(); ?>" type="text/css" rel="stylesheet"> 
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>
	<title>Password-Change</title>
</head>
  <body>
  <div class="hero">
  <div class="form-box">
  <form id="register" class="input-group" action="update_pw_code.php"  method="post">
<input type="text" class="input-field" name="email" placeholder="Enter email" required>
<input type="text" class="input-field" name="username-register" placeholder="Enter username" required>
<input type="password" class="input-field" name="password" placeholder="Enter your current password" required>

<input  class="input-field" type="password" name="password-new" placeholder="Enter new Password" required>

<button type="submit" class="submit-btn" name="register-btn">submit</button>
</form>
  </div>
  </div>
  </body>
</html>