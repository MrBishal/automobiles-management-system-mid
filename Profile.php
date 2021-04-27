<!DOCTYPE html>
<html>
    <head>
        <title>Admin Information</title>
    </head>
    <body>

    
    <?php
 
        session_start();
        $var = $_SESSION['user'];


        $file = fopen("data.txt", "r");
        
        $data = fread($file, filesize("data.txt"));

        $data_filter = explode("\n", $data);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
            
            $json_decode = json_decode($data_filter[$i], true);
            

            if($json_decode['userName'] == $var) 
            {
                $firstName = $json_decode['firstName'];
                $lastName = $json_decode['lastName'];
                $gender = $json_decode['gender'];
                $email = $json_decode['email'];
                $userName = $json_decode['userName'];
                $password = $json_decode['password'];
                $recoveryEmail = $json_decode['recoveryEmail'];
            }

        }
        fclose($file);

    ?>

        <?php

            if(array_key_exists('logoutBtn', $_POST)) {
                logout();
            }
            else if(array_key_exists('updateInfoBtn', $_POST)) {
                updateInfo();
            }

            function logout() {
                unset($_SESSION['user']);
                header('Location: Admin_Registration.php');
                exit;
            }
            function updateInfo() {
                echo "This is updateinfo is selected";
                header('Location: Admin_UpdateInfo.php');
                exit;
            }

        ?>
        

            <fieldset>
                <legend><b>Admin Information:</b></legend>
            
                <label for="firstName"> First Name: </label>
                <?php echo $firstName; ?>

                <br>

                <label for="lastName"> Last Name: </label>
                <?php echo $lastName; ?>

                <br>

                <label for="gender"> Gender: </label>
                <?php echo $gender; ?>

                <br>

                <label for="email"> Email: </label>
                <?php echo $email; ?>

                <br>

                <label for="userName"> User Name: </label>
                <?php echo $userName; ?>

                <br>

                <label for="password"> Password: </label>
                <?php echo $password; ?>

                <br>

                <label for="recoveryEmail"> Recovery Email: </label>
                <?php echo $recoveryEmail; ?>

            </fieldset>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="submit" name="logoutBtn" value="Log Out">

            <input type="submit" name="updateInfoBtn" value="Update Information">
        </form>
        
    </body>
</html>