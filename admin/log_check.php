<?php
		session_start();
		include "inc/config.php";
	
		if(isset($_POST['submit'])){
			$uname=$_POST['email'];
			$pass=$_POST['password'];
			
			$result = mysqli_query($conn,"select * from admin where username='$uname' and password='$pass'");
			$row = mysqli_fetch_assoc($result);
	
			if(mysqli_num_rows($result)>0){
				$_SESSION["id"] = $row ['id'];
				
				if(isset($_SESSION['id'])){
					/*echo '<script type= text/javascript>';
					echo 'window.location.href = "dashboard.php"';
					echo '</script>';*/
					header("location:dashboard.php");
				}
			}
			else{
				// echo '<script type="text/javascript">
				// 		window.location.href = "login.php?log_error=1";
						
				// 	</script>';
				header("location:login.php?error=1");
			}
		}
	
	?>