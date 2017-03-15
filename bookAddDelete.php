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

if($_POST['add_delete'] == 'delete'){
    try {
        $conn = new dbPDO();
        $query = $conn->prepare("DELETE FROM $library_choice WHERE user_id = '$user_id' AND isbn = '$isbn'");
        $query->execute();
        $conn = null;
        $sth = null;
        echo 'deleted';

    } catch (PDOException $p) {
        echo $p->getMessage();
    }
}

?>

<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>ISBN <?php echo $isbn; ?></h2>
                    <h2>Location <?php echo $library_choice; ?></h2>
                    <h2>Add or Delete? <?php echo $add_delete; ?>
                    </h2>
                
                </div>
            </div><!--row-->
                
        </div>
    </div><!--container-->
</main>