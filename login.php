<?php 
//TODO - update DB credentials

session_start();
include 'includes/header.php';

//if login form submitted
if (isset($_POST['submit'])){ 
    
    //connect to database
    $servername = "localhost";
    $username = "testuser";
    $password = "testuserpass";
    $dbname = "ul";
    
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connection){
        die("Database Connection Failed" . mysqli_error($connection));
    }
    
    //query database with username & password user entered
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $query = "SELECT * FROM `user` WHERE user_email='$username' and user_password='$password'";
 
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $row = mysqli_num_rows($result);
    
    //if username/password found
    if ($row == 1){
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['is_auth'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_first_name'] = $row['user_first_name'];
        }
        $user_id = $_SESSION['user_id'];
        $name = $_SESSION['user_first_name'];
        echo  ' <div class="jumbotron">
                <div class="container">
                <div class="text-center col-md-12">
                
                <p>Login Successful, ' . $name . '!</p>
                <a href="user.php?' . $user_id . '">Go to Library</a>
                
                </div><!--col-md-12-->
                </div><!--container-->
                </div><!--end jumbrotron-->'
            ;
         
    }else{//output login form again with error message
    echo '<main>
    <div class="jumbotron">
        <div class="container">
                <div class="col-md-12">
                    <form method="post">
                    <div class="form-group row">
                      <label for="InputUsername" class="col-2 col-form-label">Username</label>
                      <div class="col-10">
                        <input class="form-control" id="InputUsername" type="text" name="username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputPassword" class="col-2 col-form-label">Password</label>
                      <div class="col-10">
                        <input class="form-control" id="InputPassword" type="text" name="password">
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                        <div class="login-button col-md-12">
                            <input class="btn btn-secondary btn-block" name="submit" type="submit" value="Log In">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <div class="col-md-12">
                            <p class="text-center">Invalid Username and/or Password</p>
                        </div>
                    </div>
                    </form>
                </div><!--col-md-12-->
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
</main>';

    }
}else{
     echo '<main>
    <div class="jumbotron">
        <div class="container">
                <div class="col-md-12">
                    <form method="post">
                    <div class="form-group row">
                      <label for="InputUsername" class="col-2 col-form-label">Username</label>
                      <div class="col-10">
                        <input class="form-control" id="InputUsername" type="text" name="username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="InputPassword" class="col-2 col-form-label">Password</label>
                      <div class="col-10">
                        <input class="form-control" id="InputPassword" type="text" name="password">
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                        <div class="login-button col-md-12">
                            <input class="btn btn-secondary btn-block" name="submit" type="submit" value="Log In">
                        </div>
                    </div>
                    </form>
                </div><!--col-md-12-->
        </div><!--container-->
    </div><!--end jumbrotron-->
    
</main>';

}
?>





</body>
<?php include 'includes/footer.php' ?>
   