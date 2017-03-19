<?php
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}

function strip_all($string) {
    $string = trim($string);
    $string = strtolower($string);
    $string = preg_replace("/[^0-9]+/", "", $string);
    $string = str_replace(" +", "", $string);
    return $string;
}

// get POST array data
if(isset($_POST['submit'])){
    $isbn = $_POST['isbn'];
    $isbn = strip_all($isbn);
    if (strlen($isbn) != 10 && strlen($isbn) != 13) {
        echo "Please enter 10 or 13 digit ISBN number.";
    }	
    $library_choice = $_POST['library_choice'];
    $add_delete = $_POST['add_delete'];
    $user_id = $_SESSION['user_id'];
}else{
    header("location:user.php");
}

include 'Library.php';
include 'includes/header-user.php';

$message = '';

if($_POST['add_delete'] == 'delete'){
    try {
        $conn = new dbPDO();
        $query = $conn->prepare("DELETE FROM $library_choice WHERE user_id = '$user_id' AND isbn = '$isbn'");
        $query->execute();
        $conn = null;
        $sth = null;
        
        $message = "This book deleted successfully!";

    } catch (PDOException $p) {
        echo $p->getMessage();
    }
}else if($_POST['add_delete'] == 'add'){
    $location = '';
    if($library_choice == 'user_owns_book'){
        Library::insertBook(''. $isbn . '','' . $user_id . '');
        $location = 'Library';
    }else if($library_choice == 'user_requests_book'){
       Library::insertRequest(''. $isbn . '','' . $user_id . '');
        $location = 'Requests';
    }
    $message = "This book added successfully to your " . $location . "!";
}

?>

<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <h4><?php echo $message; ?></h4>
                        <?php Library::getBook($isbn); ?>
                    <br><br>
                    <h4><a href="./user.php">Return to user page -></a></h4>
                    
                
                </div>
            </div><!--row-->
                
        </div>
    </div><!--container-->
</main>
