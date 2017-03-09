<?php include 'includes/header.php'?>
<?php 

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
<h1>Please complete all fields to sign up for BookSwap:</h1>
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <form action="registration.php" method="post">
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
                            </div>
							<br>
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                            </div>
							<br>
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                            </div>
							<br>
							<div class="form-group">
                                <input class="form-control" type="text" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>">
                            </div>
							<br>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'" name="state" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>">
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

   
