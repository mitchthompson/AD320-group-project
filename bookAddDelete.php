<?php
//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION["is_auth"])) {
	header("location:login.php");
	exit;
}
if(isset($_POST['submit'])){
    $isbn = $_POST['isbn'];
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
    $message = "This book added successfuly to your " . $location;
}

?>

<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <p><?php echo $message; ?></p>
                    <br><br>
                        <?php Library::getBook($isbn); ?><br><br>
                    <a href="./user.php">Return to user page -></a>
                    
                
                </div>
            </div><!--row-->
                
        </div>
    </div><!--container-->
</main>