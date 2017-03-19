<?php include 'includes/header.php';

//set default values for variables
$first_name = '';
$last_name = '';
$username = '';
$password = '';
$email = '';
$city = '';
$state = '';
$message = '';
?>

<main>
    <div class="jumbotron register">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h2>Registration</h2>
                    <p>Please complete all fields to sign up for BookSwap</p>
                    <form action="registration.php" method="post">
							<div class="form-group">
							<b>First Name </b><br>
                                <input class="form-control" type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                            </div>
							<br>
							<div class="form-group">
							<b>Last Name </b><br>
                                <input class="form-control" type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                            </div>
							<br>
                            <div class="form-group">
							<b>Password </b><br>
                                <input class="form-control" type="text" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                            </div>
							<br>
                            <div class="form-group">
							<b>Email </b><br>
                                <input class="form-control" type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>
							<br>
							<div class="form-group">
							<b>City </b><br>
                                <input class="form-control" type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
                            </div>
							<br>
                            <div class="form-group">
							<b>State </b><br>
                                <input class="form-control" type="text" name="state" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>">
                            </div>
							<br>
							<div class="form-group">
                             <input class="btn btn-primary btn-block" type="submit" value="Register">
                            </div>  
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
</main>
</body>
<?php include 'includes/footer.php' ?>

   
