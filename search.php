<?php 

include 'includes/header.php';
include 'Library.php';

// get isbn from search box on user's page
if (isset($_POST['isbn'])) {
    $isbn = $_POST['isbn'];
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
                 <div class="col-md-3">
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
