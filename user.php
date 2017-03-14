<?php
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}
$name = $_SESSION['user_first_name'];
$user_id = $_SESSION['user_id'];

include 'Library.php';
include 'includes/header-user.php';


?>
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><?php echo $name ?>'s Books</h2>
                </div>
               
                
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron user-->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 library">
                    <h3 class="text-center">Library</h3>
                    
                        <ul class="list-inline">
                      <?php Library::getBooksByUser($user_id); ?>
                        </ul>
                 
                    <div class="row">
                    <div class="col-md-12" style="margin-bottom: 30px">
                        <input class="btn btn-secondary btn-block" name="addBook" type="submit" value="Add to Library">
                    </div>
                    </div>
                </div><!--col-md-12-->
                <div class="col-lg-12">
                    <h3 class="text-center">Requesting</h3>
                    <ul class="list-inline">
                      <?php Library::getRequestsByUser($user_id); ?>
                    </ul>
                    <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-secondary btn-block" name="addRequesting" type="submit" value="Add to Requesting">
                    </div>
                    </div>
                </div><!--col-md-6-->
            </div><!--end row-->
        </div><!--container-->
    </div><!--end jumbrotron library-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   
