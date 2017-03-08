<?php include 'includes/header.php'?>
<?php 
//set default values for variables
if (!isset($first_name)) {$first_name = ''; }
if (!isset($last_name)) {$last_name = ''; }
if (!isset($username)) {$username = ''; }
if (!isset($password)) {$password = ''; }
if (!isset($email)) {$email = ''; }
if (!isset($postalcode)) {$postalcode = ''; }

?>

<main>
	<h1>Please complete all fields to sign up</h1>
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
				<?php if (!empty($error_message)) { ?>
					<p><?php echo htmlspecialchars($error_message); ?></p>
				<?php } ?>	
                    <form action="registration.php" method="post">
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
                            </div>
							<br>
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
                            </div>
							<br>
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" name="username" value="<?php echo htmlspecialchars($username); ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" name="password" value="<?php echo htmlspecialchars($password); ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" name="email" value="<?php echo htmlspecialchars($email); ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'" name="postalcode" value="<?php echo htmlspecialchars($postalcode); ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="btn btn-secondary btn-block" type="submit" value="Register">
                            </div>    
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
</main>
</body>
<?php include 'includes/footer.php' ?>
   
