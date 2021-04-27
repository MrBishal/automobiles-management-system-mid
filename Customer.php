<!DOCTYPE html>
<html>
<head>
	<title>Customer Information</title>
</head>

	<?php
	// session_start();
	// echo "Logged in Successfully... Welcome Admin : " . "<b>". $_SESSION['user'] . "</b>". "<br><br>";
	?>

<body style="text-align:center;">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="submit" name="addCustomerBtn" value="Add Customer" /><br><br>

        <input type="submit" name="listBtn" value="Customers List" /><br><br>

    </form> 

	<?php
        if(array_key_exists('addCustomerBtn', $_POST)) {
            addCustomer();
        }
        else if(array_key_exists('listBtn', $_POST)) {
            customerList();
        }

        function addCustomer() {
            header('Location: Add_Customer.php');
			exit;
        }
        function customerList() {
        $f = fopen("cdata.txt", "r");
                
        $data = fread($f, filesize("cdata.txt"));
        $data_filter = explode("\n", $data);

        echo "<br><br>";
        echo "Customers List:";

        for($i = 0; $i< count($data_filter)-1; $i++){
            $json_decode = json_decode($data_filter[$i], true);

            echo "<br>";
            echo "User Name: " . $json_decode['userName'] . "<br>"; 
            echo "First Name: " . $json_decode['firstName'] . "<br>";
            echo "Last Name: " . $json_decode['lastName'] . "<br>";
            echo "Gender: " . $json_decode['gender'] . "<br>";
            echo "Email: " . $json_decode['email'] . "<br>";
            echo "Password: " . $json_decode['password'] . "<br>";
            echo "Recovery Email: " . $json_decode['recoveryEmail'] . "<br><br><br>";         
        }
        }

    ?>


</body>
</html>