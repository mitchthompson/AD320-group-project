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
}

//if error message exists, go back to registration page

if ($error_message != '') {
	include('register.php');
	exit();
}

?>
