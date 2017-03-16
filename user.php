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
    <!--  search function -->
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="search.php" method="post">
                        <div class="col-md-3">
                            <select class="form-control form-control-lg" name="search_type">
                                <!--<option value="" disabled selected>Choose...</option>-->
                                <!--<option value="Title">Title</option>-->
                                <option value="ISBN">ISBN</option>
                            </select>
                        </div><!--col-md-3-->
                    </form>
                    <form action="search.php" method="post">
                        <div class="col-md-5">
                            <input class="form-control form-control-lg" type="text" placeholder="Look for book..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Look for book...'" name="isbn" value="<?php if(isset($_POST['isbn'])) echo htmlspecialchars($_POST['isbn']); ?>">
                        </div><!--col-md-5-->
                        <div class="col-md-4">
                            <input class="btn btn-secondary btn-block" type="submit" value="Search">
                        </div><!--col-md-4-->
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
	
    <!--display user's library-->		
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><?php echo $name ?>'s Books</h2>
                </div>
                <div class="col-lg-12 library">
                    <h3 class="text-center">Library</h3>
                     <div class="table-responsive" overflow>
                            <table class="table">
                                <tr class="col-md-1">
                      			<?php Library::getBooksByUser($user_id); ?>
				</tr>
                            </table>
                     </div>    
                </div><!--col-md-12-->
		    
		  <!--display user's requests-->	   
                <div class="col-lg-12">
                    <h3 class="text-center">Requesting</h3>
                    	<div class="table-responsive" overflow>
                            <table class="table">
                                <tr class="col-md-1">
                      			<?php Library::getRequestsByUser($user_id); ?>
                                </tr>
                            </table>
                        </div>
			
		  <!-- add or remove books-->	
                    <div class="col-md-12">
                        <form action="bookAddDelete.php" method="post">
                            <input class="form-control" type="text" placeholder="Enter ISBN to Add or Delete Book" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter ISBN to Add or Delete Book'" name="isbn" id="ISBN" required="true">
                            
                            <select class="form-control form-control-lg" name="library_choice" required="true">
                                  <option value="" disabled selected>Edit Library or Requesting Books?</option>
                                    <option value="user_owns_book">Library</option>
                                  <option value="user_requests_book">Requesting</option>
                                </select>
                            <select class="form-control form-control-lg" name="add_delete" required="true">
                                  <option value="" disabled selected>Add or Delete?</option>
                                    <option value="add">Add</option>
                                  <option value="delete">Delete</option>
                                </select>
                            <div class="form-group row">    
                        <div class="col-md-6 col-md-offset-3">
                            <input class="btn btn-secondary center-block btn-block" name="submit" type="submit" value="Submit">
                        </div>
                    </div>
                        </form>
                    </div><!--col-md-12-->
                
            </div><!--end row-->
        </div><!--container-->
    </div><!--end jumbrotron library-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   
