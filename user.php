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

include 'Book.php';
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
                <div class="col-lg-6 library">
                    <p class="text-center">Library</p>
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>    
                    </div><!--list-group-->
                    <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-secondary btn-block" name="addBook" type="submit" value="Add to Library">
                    </div>
                    </div>
                </div><!--col-md-6-->
                <div class="col-lg-6">
                    <p class="text-center">Requesting</p>
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>    
                    </div><!--list-group-->
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
   