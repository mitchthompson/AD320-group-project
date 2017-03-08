<?php include 'includes/header.php'?>
<main>
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="user.php" method="post">
                        <div class="">
                            <div class="col-md-4">
                                <input class="form-control" type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" name="username">
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" name="password">
                            </div>
                                <div class="col-md-4">
                                <input class="btn btn-secondary btn-block" type="submit" value="Log In">
                            </div>    
                        </div><!--form-inline-->
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   