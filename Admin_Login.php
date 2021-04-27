<!DOCTYPE html>
<html>

<head>
	<title>Admin Login</title>
</head>
<body style="text-align:center;">

	<?php 
	session_start();

		$userName = $password = "";
		$userNameErr = $passwordErr = "";

		if($_SERVER['REQUEST_METHOD'] == "POST") {
			
			if(empty($_POST['uname'])) {                    
                $userNameErr = "Username is required.";
            }

            else if(empty($_POST['pword'])) {                    
                $passwordErr = "Password is required.";
            } 
			else {
				
				$userName = $_POST['uname'];
				$password = $_POST['pword'];
				
				$f = fopen("data.txt", "r");
				
				$data = fread($f, filesize("data.txt"));
				$data_filter = explode("\n", $data);

				for($i = 0; $i< count($data_filter)-1; $i++){
					$json_decode = json_decode($data_filter[$i], true);

					if(($json_decode['userName']==$userName) && ($json_decode['password']==$password))
					{
						$_SESSION['user']= $userName;
						$_SESSION['password']= $password;

						header('Location: Admin_Profile.php');
						exit;
					
					}
				
					else
					{
						echo "Login Failed";
					}
				}
				 
			}
		}
	?>

	<h1>Login Form</h1>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<fieldset>
		<legend><h3>Fillup Account Information:</h3></legend>

		<label for="userName"><b>User Name: </b></label>
		<input type="text" id="userName" name="uname">
		<?php echo $userNameErr; ?>

		<br>
		
		<label for="Password"><b>Password: </b></label>
		<input type="password" id="Password" name="pword">
		<?php echo $passwordErr; ?>

		<br>
				
		</fieldset>

		<input type="submit" value="Login">
		<input type="reset" value="Reset">

	</form>

</body>
</html>