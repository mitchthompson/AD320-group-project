<?php
/*Bonnie Peterson AD320 Project */

//get data from registration form
$first_name = '';
$last_name = '';
$username = '';
$password = '';
$email = '';
$city = '';
$state = '';
$message = '';


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
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<p><?php echo $message;?></p>
				<?php if (!empty($message)){ ?><a href="register.php">Return to registration page</a><?php } ?>
				<?php if ($message === ''){ ?><a href="login.php">Registration successful! Go to login page</a><?php } ?>
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron-->
   
</main>
</body>

<?php include 'includes/footer.php'; ?>
