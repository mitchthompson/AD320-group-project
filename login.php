<?php 
session_start();
include 'includes/header.php';
include 'db/dbPDO.php';


//if login form submitted
if (isset($_POST['submit'])){ 
    
    //connect to database
    $connection = new dbPDO();
    
    //query database with username & password user entered
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    try {
    $conn = new dbPDO();
    $query = $conn->prepare("SELECT * FROM `user` WHERE user_email='$username'");
    $query->execute();
    $row = $query->rowCount();

    while($rows = $query->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $rows['user_id'];
            $name = $rows['user_first_name'];
            $hashed_password = $rows['user_password'];
   
    }

        
    $verify = password_verify('' . $password . '','' . $hashed_password . '');
        
            
    //if username/password found
    if ($row == 1 and $verify){
        $_SESSION['is_auth'] = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_first_name'] = $name;
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
                        <input class="form-control" id="InputPassword" type="password" name="password">
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
        $conn = null;
        $sth = null;

    } catch (PDOException $p) {
        echo $p->getMessage();
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
                        <input class="form-control" id="InputPassword" type="password" name="password">
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
   
