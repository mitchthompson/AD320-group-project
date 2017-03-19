<?php
/*Bonnie Peterson AD320 Project */
//TODO - update DB credentials in db/db_settings.ini file
include 'db/dbPDO.php';

//set variables
$first_name = '';
$last_name = '';
$password = '';
$email = '';
$city = '';
$state = '';
$message = '';


//create password hash
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
//form validation
foreach($_POST as $key=>$value) {
if(empty($_POST[$key])) {
$message = "Error: " . ucwords($key) . " field is required";
break;
}
}

//email validation
if(!isset($message)) {
	if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$message = "Invalid email.";
	}
}


include 'includes/header.php'?>

<!--display links to direct user to login page or to return to register page if errors present-->
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
				<p><?php echo $message;?></p>
                    <?php if (!empty($message)){ ?><p><a href="register.php">Return to registration page</a></p><?php } ?>
                    <?php if ($message === ''){ ?><p>Registration successful!</p><a class="btn btn-primary btn-lg" href="login.php">Log in</a><?php } ?>
                <p><?php echo $message; ?></p>
				</div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron-->
   
</main>
</body>
<?php

//insert user data into 'user' SQL table
try {
    $conn = new dbPDO();

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO user (user_city, user_email, user_first_name, user_last_name, user_password, user_state) VALUES
('" . $_POST["city"] . "', '" . $_POST["email"] . "', '" . $_POST["first_name"] . "', '" . $_POST["last_name"] . "', '" . $pass . "', '" . $_POST["state"] . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
	//echo "New record created successfully";
    }
catch(PDOException $e)
    {
    //echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


include 'includes/footer.php'; ?>
