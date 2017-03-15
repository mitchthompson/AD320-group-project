<?php
/*Bonnie Peterson AD320 Project */
//TODO - update DB credentials in db/db_settings.ini file
include 'db/dbPDO.php';

//set variables
$first_name = '';
$last_name = '';
$username = '';
$password = '';
$email = '';
$city = '';
$state = '';
$message = '';
$k = '';
$v = '';

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

?>
<?php include 'includes/header.php'?>

<!--display links to direct user to login page or to return to register page if errors present-->
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<p><?php echo $message;?></p>
				<?php if (!empty($message)){ ?><a href="register.php">Return to registration page</a><?php } ?>
				<?php if ($message === ''){ ?><a href="login.php">Registration successful! Go to login page</a><?php } ?>
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
    $stmt = $conn->prepare("SELECT user_email FROM user WHERE user_email = $_POST["email""); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $row = $result->rowCount();
	if ($row > 0) {
		$message = "This email is already registered. Please return to the login page.";
	}
	else {
    $sql = "INSERT INTO user (user_city, user_email, user_first_name, user_last_name, user_password, user_state) VALUES
('" . $_POST["city"] . "', '" . $_POST["email"] . "', '" . $_POST["first_name"] . "', '" . ($_POST["last_name"]) . "', '" . $pass . "', '" . $_POST["state"] . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    }
}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

<?php include 'includes/footer.php'; ?>
