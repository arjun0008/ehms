<?php
	include "inc/config.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-HMS Login</title>
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<div class="main">
	<div class="container">
		<!--<h1 class="label">User Login</h1>-->
		
		<form class="login_form" action="" method="post" name="form" onsubmit="return validated()">
			<div class="logo"><img src="src/3.png" alt="logo"></div>
			<div id="email_error">Please fill up your Email</div>
			<div id="pass_error">Please fill up your Password</div>
			<div id="log_error" style=" justify-content: center; <?php if(isset($_GET['error'])){echo "display:flex;"; unset($_GET['error']); } else{ echo "display:none;"; } ?>">Wrong username or Password</div>
			<div class="font" id="emailid"><ion-icon name="person-outline"></ion-icon><input autocomplete="off" placeholder="Username" type="text" class="field" name="email"></div>
			
			<!--<div id="email_error">Please fill up your Email or Phone</div>-->
			<div class="font font2" id="passid"><ion-icon name="key-outline"></ion-icon><input type="password" placeholder="Password" class="field" name="password"></div>
			<div class="last">
				<a href="#" class="fp">Forgot password?</a>
				<input type="submit" class="butt" name="submit" value="Login">
			</div>
			<!--<div id="pass_error">Please fill up your Password</div>-->
		</form>
		
	</div>
</div>
	<div class="copyright">
		<i class='bx bx-copyright'></i>
		<p> 2023 - e-Hospital hms</p>
	</div>	
	<?php

	
		if(isset($_POST['submit'])){
			$uname=$_POST['email'];
			$pass=$_POST['password'];
			
			$result = mysqli_query($conn,"SELECT * FROM `admin` WHERE username='$uname' and password='$pass'");
			$row = mysqli_fetch_assoc($result);
	
			if(($row)>0){

				$_SESSION["adm_login"] = 1;
				
				if(isset($_SESSION['adm_login'])&&$_SESSION['adm_login']==1){
					/*echo '<script type= text/javascript>';
					echo 'window.location.href = "dashboard.php"';
					echo '</script>';*/
					header("location:dashboard.php");
				}
			}
			else{
				header("location:login.php?error=invalid_credentials");
				// echo '<script type="text/javascript">';
				// echo 'document.getElementById("log_error").style.display = "block"';
				// echo 'window.location.href = "login.php?error=invalid_credentials"';
				// echo '</script>';
			}
		}
	
	?>
	<script src="js/valid.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>