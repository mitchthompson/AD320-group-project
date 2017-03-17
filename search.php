<?php 

session_start();

if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}

include 'Library.php';
include 'includes/header-user.php';

function strip_all($string) {
    $string = trim($string);
    $string = strtolower($string);
    $string = preg_replace("/[^0-9]+/", "", $string);
    $string = str_replace(" +", "", $string);
    return $string;
}

// get isbn from search box on user's page
if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
    $isbn = strip_all($isbn);
    if (strlen($isbn) != 10 && strlen($isbn) != 13) {
        echo "Please enter 10 or 13 digit ISBN number.";
    }			
}    
    

?>

<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-inline">
                        <?php Library::getBook($isbn); ?>
                    </ul>
                </div><!--col-md-3-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron--> 
    
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                 <div class="col-md-6">
                    <ul class="list-inline">
                        <h4 class="text-center">Contact information for users with this book:</h4>
                        <?php Library::getUsersByBook($isbn); ?>
                    </ul>
                </div><!--col-md-3-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron-->
   
</main>




</body>
<?php include 'includes/footer.php' ?>
