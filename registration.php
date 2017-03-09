<?php
//get registration data from registration form

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$postalcode = filter_input(INPUT_POST, 'postalcode', FILTER_VALIDATE_INT);
$error_message = '';

//validate all fields entered

if (!isset($first_name) || !isset($last_name) || !isset($username) || !isset($password) || !isset($email) || !isset($postalcode)) {
	$error_message = "Please complete all fields to register.";
?><p><?php echo $error_message; ?></p><?php
}

//if error message exists, go back to registration page

if ($error_message != '') {
	include('register.php');
	exit();
}

?>
<?php include 'includes/header.php'?>
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div><!--col-md-12-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron-->
   
</main>




</body>
<?php include 'includes/footer.php' ?>
