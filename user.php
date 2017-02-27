<?php include 'includes/header.php'?>
<main>
    <div class="jumbotron user">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Username's Books</h2>
                </div>
                <div class="col-md-3"></div>
                <div class="col-sm-6 col-md-5 sort">
                    <form action="sort.php" method="post">
                            <div class="col-sm-6 col-md-5">
                                <select class="form-control form-control-lg" name="cars">
                                  <option value="" disabled selected>Sort books by..</option>
                                  <option value="Title">Title</option>
                                  <option value="Author">Author</option>
                                </select>
                            </div><!--col-md-6-->
                            <div class="col-sm-6 col-md-6">
                                <input class="btn btn-secondary btn-block" type="submit" value="Sort">
                            </div> <!--col-md-6-->
                    </form>
                </div><!--col-md-6-->
            </div><!--row-->
        </div><!--container-->
    </div><!--jumbotron user-->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 library">
                    <p class="text-center">Library</p>
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>    
                    </div><!--list-group-->
                </div><!--col-md-6-->
                <div class="col-lg-6">
                    <p class="text-center">Looking for...</p>
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>
                      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Book Title</h5>
                          <small>Author</small>
                        </div>
                      </a>    
                    </div><!--list-group-->
                </div><!--col-md-6-->
            </div><!--end row-->
        </div><!--container-->
    </div><!--end jumbrotron library-->
    
</main>




</body>
<?php include 'includes/footer.php' ?>
   