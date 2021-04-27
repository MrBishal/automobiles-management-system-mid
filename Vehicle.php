<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Information</title>
</head>

	<?php
	// session_start();
	// echo "Logged in Successfully... Welcome Admin : " . "<b>". $_SESSION['user'] . "</b>". "<br><br>";
	?>

<body style="text-align:center;">

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="submit" name="addVehicleBtn" value="Add Vehicle" /><br><br>

        <input type="submit" name="listBtn" value="Vehicle List" /><br><br>

    </form> 

	<?php
        if(array_key_exists('addVehicleBtn', $_POST)) {
            addVehicle();
        }
        else if(array_key_exists('listBtn', $_POST)) {
            vehicleList();
        }

        function addVehicle() {
            header('Location: Add_Vehicle.php');
			exit;
        }
        function vehicleList() {
        $f = fopen("vdata.txt", "r");
                
        $data = fread($f, filesize("vdata.txt"));
        $data_filter = explode("\n", $data);

        echo "<br><br>";
        echo "Vehicle List:";

        for($i = 0; $i< count($data_filter)-1; $i++){
            $json_decode = json_decode($data_filter[$i], true);

            echo "<br>";
            echo "Brand Name: " . $json_decode['brandName'] . "<br>"; 
            echo "Model Name: " . $json_decode['modelName'] . "<br>";
            echo "Type: " . $json_decode['type'] . "<br>";
            echo "Security No: " . $json_decode['securityNo'] . "<br><br><br>";
                     
        }
        }

    ?>


</body>
</html>