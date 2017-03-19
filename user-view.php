<?php
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}
$user_id = $_GET['user_id'];

include 'Library.php';
include 'includes/header-user.php';

try {
        $conn = new dbPDO();
        $query = $conn->prepare("SELECT * FROM user WHERE user_id = '$user_id'");
        $query->execute();
        
        $query->execute();
        $row = $query->rowCount();

        while($rows = $query->fetch(PDO::FETCH_ASSOC)) {
                $name = $rows['user_first_name'];
                $email = $rows['user_email'];
                $state = $rows['user_state'];
                $city = $rows['user_city'];

        }
    $conn = null;
    $sth = null;

    } catch (PDOException $p) {
        echo $p->getMessage();
    }


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
                    <p><?php echo $city . ', ' . $state ?> | <?php echo $email ?></p>
                </div>

                
                <div class="col-lg-12 library">
                    <h3 class="text-center">Library</h3>
			<div class="center-block">
                     		<div class="table-responsive" overflow>
                            		<table class="table">
                                		<tr>
                      					<?php Library::getBooksByUser($user_id); ?>
						</tr>
                            		</table>
				</div>
                     	</div>    
                </div><!--col-md-12-->
		    
		  <!--display user's requests-->	   
                  <div class="col-lg-12">
                    <h3 class="text-center">Requesting</h3>
			<div class="center-block">
                    		<div class="table-responsive" overflow>
                            		<table class="table">
                                		<tr>
                      					<?php Library::getRequestsByUser($user_id); ?>
                                		</tr>
                            		</table>
				</div>		
                        </div>
		    </div><!--col-md-12-->	
			
		  
                
            </div><!--end row-->
        </div><!--container-->
    </div><!--end jumbrotron library-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   
