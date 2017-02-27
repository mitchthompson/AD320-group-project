<?php include 'includes/header.php'?>
<main>
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="search.php" method="post">
                            <div class="col-md-3">
                                <select class="form-control form-control-lg" name="cars">
                                  <option value="" disabled selected>Choose...</option>
                                  <option value="Title">Title</option>
                                  <option value="Author">Author</option>
                                  <option value="ISBN">ISBN</option>
                                </select>
                            </div><!--col-md-3-->
                            <div class="col-md-5">
                                <input class="form-control" type="text" placeholder="Look for book..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Look for book...'" id="user-search">
                            </div><!--col-md-5-->
                            <div class="col-md-4">
                                <input class="btn btn-secondary btn-block" type="submit" value="Search">
                            </div><!--col-md-4-->   
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
    <div class="jumbotron about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Morbi erat nisl, ultricies a lobortis ac, varius hendrerit risus. Donec sed consequat elit. Fusce suscipit tortor sit amet dui sodales condimentum. In auctor, mi sed lobortis tempor, tellus purus sagittis est, sed aliquam ex sapien vitae augue. Etiam ut ultrices sapien. Suspendisse bibendum turpis sit amet risus dapibus fermentum. Cras viverra felis justo, ac vehicula odio hendrerit in. Aenean in commodo lectus.</p>
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
   