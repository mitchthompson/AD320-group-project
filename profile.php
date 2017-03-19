<?php 
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}

include 'Library.php';
include 'includes/header-user.php';

$user_id = $_SESSION['user_id'];
$message = '';

try {
    $conn = new dbPDO();
    $query = $conn->prepare("SELECT * FROM user WHERE user_id = '$user_id'");
    $query->execute();
    $row = $query->rowCount();

    while($rows = $query->fetch(PDO::FETCH_ASSOC)) {
            $first_name = $rows['user_first_name'];
            $last_name = $rows['user_last_name'];
            $user_city = $rows['user_city'];
            $user_state = $rows['user_state'];
            $user_email = $rows['user_email'];
    }
    
    $conn = null;
    $sth = null;

} catch (PDOException $p) {
    echo $p->getMessage();
}

if(isset($_POST['submit'])){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $conn = new dbPDO();
        $query = $conn->prepare("UPDATE user SET user_password= '$password' WHERE user_id = '$user_id'");
        
        $query->execute();

        $conn = null;
        $sth = null;

    } catch (PDOException $p) {
        echo $p->getMessage();
    }
    }

?>


<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>First Name: <?php echo $first_name; ?></p>
                    <p>Last Name: <?php echo $last_name; ?></p>
                    <p>City: <?php echo $user_city; ?></p>
                    <p>State: <?php echo $user_state; ?></p>
                    <p>Email: <?php echo $user_email; ?></p>    
                </div><!--col-md-6-->
                <div class="col-md-6">
                    <form action="profile.php" method="post">
                            
                                <label>Update Password</label><br>
                                <input class="form-control" type="password" id="password" name="password"><br>
                                <input class="btn btn-secondary btn-block" type="submit" name="submit" value="Update">
                                <?php echo $message; ?>
                         
                    </form>
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron-->
   
</main>




</body>
<?php include 'includes/footer.php' ?>