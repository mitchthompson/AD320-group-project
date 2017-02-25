<?php include 'includes/header.php'?>
<main>
    <div class="jumbotron intro">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <form action="search.php" method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" name="username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" name="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'" name="postalcode">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-secondary btn-block" type="submit" value="Register">
                            </div>    
                    </form>
                </div><!--col-md-12-->
            </div>
        </div><!--container-->
    </div><!--end jumbrotron intro-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   