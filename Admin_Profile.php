<!DOCTYPE html>
<html>
<head>
	<title>Admin Profile</title>
</head>

	<?php
	session_start();
	echo "Logged in Successfully... Welcome Admin : " . "<b>". $_SESSION['user'] . "</b>". "<br><br>";
	?>

<body style="text-align:center;">

	<?php
        if(array_key_exists('profileBtn', $_POST)) {
            profile();
        }
        else if(array_key_exists('customerBtn', $_POST)) {
            customer();
        }
        else if(array_key_exists('accountantBtn', $_POST)) {
            accountant();
        }
        else if(array_key_exists('mechanicBtn', $_POST)) {
            mechanic();
        }
        else if(array_key_exists('vehicleBtn', $_POST)) {
            vehicle();
        }
        else if(array_key_exists('logoutBtn', $_POST)) {
            logout();
        }

        function profile() {
            header('Location: Profile.php');
			exit;
        }
        function customer() {
            header('Location: Customer.php');
			exit;
        }
        function accountant() {
            header('Location: Accountant.php');
			exit;
        }
        function mechanic() {
            header('Location: Mechanic.php');
			exit;
        }
        function vehicle() {
            header('Location: Vehicle.php');
			exit;
        }
        function logout() {
            unset($_SESSION['user']);
            header('Location: Admin_Registration.php');
            exit;
        }
    ?>
  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="submit" name="profileBtn" value="Prifile" /><br><br>
          
        <input type="submit" name="customerBtn" value="Customer" /><br><br>

        <input type="submit" name="accountantBtn" value="Accountant" /><br><br>

        <input type="submit" name="mechanicBtn" value="Mechanic" /><br><br>

        <input type="submit" name="vehicleBtn" value="Vehicle" /><br><br>

        <input type="submit" name="logoutBtn" value="Log Out" /><br><br>
    </form>	


</body>
</html>