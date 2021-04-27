<!DOCTYPE html>
<html>
<head>
	<title>Add Vehicle</title>
</head>
<body style="text-align:center;>

	<div class="menu">
	<?php require 'Menu.php';?>
	</div>

	<?php
		// define variables and set to empty values
		$brandName= $modelName =$type = $securityNo = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["bname"])) {
		    $brandNameErr = "Brand Name is required";
		  } else {
		    $brandName = test_input($_POST["bname"]);
		    // check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$brandName)) {
		      $brandNameErr = "Only letters and white space allowed";
		    }
		  }

		  if (empty($_POST["mname"])) {
		    $modelNameErr = "Model Name is required";
		  } else {
		    $modelName = test_input($_POST["mname"]);
		    // check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$modelName)) {
		      $modelNameErr = "Only letters and white space allowed";
		    }
		  }

		  if (empty($_POST["type"])) {
		    $typeErr = "Type is required";
		  } else {
		    $type = test_input($_POST["type"]);
		  }
		  
		    
		  if (empty($_POST["sno"])) {
		    $securityErr = "Security No. is required";
		  } else {
		    $securityNo = test_input($_POST["sno"]);
		    
		    if (strlen($_POST["sno"]) <= 7) {
        		$securityErr = "Your Security code Must Contain At Least 8 Characters!";
    		}
    		elseif(!preg_match("#[0-9]+#",$securityNo)) {
        		$securityErr = "Your Security code Must Contain At Least 1 Number!";
    		}
    		elseif(!preg_match("#[A-Z]+#",$securityNo)) {
        		$securityErr = "Your Security code Must Contain At Least 1 Capital Letter!";
    		}
    		elseif(!preg_match("#[a-z]+#",$securityNo)) {
        		$securityErr = "Your Security code Must Contain At Least 1 Lowercase Letter!";
    		}
		  }

		}

		if(!empty($_POST['bname']) && !empty($_POST['mname']) && !empty($_POST['type']) && !empty($_POST['sno'])){

			$arr1 = array('brandName' => $brandName, 'modelName' => $modelName, 'type' => $type , 'securityNo' => $securityNo);
			$json_encoded_1 = json_encode($arr1);

			$f1 = fopen("vdata.txt", "a");
			fwrite($f1, $json_encoded_1 . "\n");
			fclose($f1);

			echo "\n Vehicle added successfully!";
		}

		function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
		}
	?>

	<h1>Add Vehicle</h1>

	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<fieldset>
		<legend>Vehicle Information:</legend>

		<label for="brandName">Brand Name:</label>
		<input type="text" id="brandName" name="bname">
		<span class="error">* 
			<?php 
			if (isset($brandNameErr)) echo $brandNameErr;
			?>
				
		</span>

		<br>
		
		<label for="modelName">Model Name: </label>
		<input type="text" id="modelName" name="mname">
		<span class="error">* <?php if (isset($modelNameErr)) echo $modelNameErr;?></span>

		<br>

		<label for="type">Vehicle Type: </label>
		<input type="radio" id="type" name="type" value="Luxury">
		<label for="Luxury">Luxury</label>
		<input type="radio" id="Type" name="type" value="Sports">
		<label for="Sports">Sports</label>
		<span class="error">* <?php if (isset($typeErr)) echo $typeErr;?></span>
		<br>

		<label for="securityNo">Security No: </label>
		<input type="password" id="sequrityNo" name="sno">
		<span class="error">* <?php if (isset($securityErr)) echo $securityErr;?></span>

		<br>
		
		
		
		</fieldset>

		<input type="submit" value="Submit">
		<input type="reset" value="Reset">

	</form>

	<div class="footer">
	<?php require 'Footer.php';?>
	</div>

</body>
</html>