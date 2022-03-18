<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | News</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/sidenav.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div id="posts-section" class="col-12 col-lg-6">
                            <div class="posts mb-4">
                                <div class="posts-body">
                                    <div class="posts-image">
                                        <img src="./image/posts/ucsiopenday.jpg" alt="" />
                                    </div>
                                    <div class="posts-content px-3 py-1">
                                        <div class="posts-title">
                                            <h3>UCSI Open Day</h3>
                                        </div>
                                        <div class="posts-category">
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="#">UCSI University</a>
                                            </span>
                                        </div>
                                        <div class="posts-link pt-2 pb-3">
                                            <a class="btn btn-primary" href="./news.php">
                                                <span class="d-flex align-items-center">
                                                    Read More <i class="ico ico-sm ico-white ico-arrow-right ms-1 me-0"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="posts-footer">
                                    <div class="posts-footer-content p-2">
                                        Posted on 2021-03-24 14:26:10
                                    </div>
                                </div>
                            </div>

                            <div class="posts mb-4">
                                <div class="posts-body">
                                    <div class="posts-image">
                                        <img src="./image/posts/ucsiopenday.jpg" alt="" />
                                    </div>
                                    <div class="posts-content px-3 py-1">
                                        <div class="posts-title">
                                            <h3>UCSI Open Day</h3>
                                        </div>
                                        <div class="posts-category">
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="#">UCSI University</a>
                                            </span>
                                        </div>
                                        <div class="posts-link pt-2 pb-3">
                                            <a class="btn btn-primary" href="#">
                                                <span class="d-flex align-items-center">
                                                    Read More <i class="ico ico-sm ico-white ico-arrow-right ms-1 me-0"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="posts-footer">
                                    <div class="posts-footer-content p-2">
                                        Posted on 2021-03-24 14:26:10
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <?php include "./base/sidenav.php" ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "./base/footer.php" ?>
    <?php include "./base/script.php" ?>    

</body>
</html>
