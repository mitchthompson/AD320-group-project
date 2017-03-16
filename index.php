<?php

include 'includes/header.php';
include 'Library.php';

?>

<main>
    <!--  display library of available titles -->
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Browse Library</h3>
                    <div class="table-responsive" overflow>
                        <table class="table">
                            <tr class="col-md-1">
                                <?php Library::getLibrary(); ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron user-->
    
    <div class="jumbotron about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Welcome to the BookSwap community, the online lending library! Users can trade books with one another and list books that they are willing to loan out. Choose from a large library of books while sharing with others. Here you can search for a book or sign up to get started.</p>
                </div><!--end col-lg-12-->
                <div class="col-md-12 user-btn">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-4 col-sm-4 col-xs-6">
                        <a href="register.php" class="register btn btn-primary center-block" role="button">Register  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-6">
                        <a href="login.php" class="log-in btn btn-primary center-block" role="button">Log In  <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div><!--col-md-12-->
            </div><!--end row-->
        </div><!--container-->
    </div><!--end jumbrotron intro-->
</main>




</body>
<?php include 'includes/footer.php' ?>
   
