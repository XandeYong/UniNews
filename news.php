<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | News</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/sidenav.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div id="post-section" class="col-12 col-lg-6">
                            <div id="post" class="mb-4">
                                <div id="post-header" class="p-3">
                                    <div class="row">
                                        <h3>UCSI Club DAY</h3>
                                    </div>
                                    <div id="post-reference" class="row">
                                        <div>
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="#">UCSI University</a>
                                            </span>
                                            <span>|</span>
                                            <span>
                                                <b>Sub Category :</b> 
                                                <a class="text-decoration-none" href="#">UCSI Club</a>
                                            </span>
                                            <span>
                                                <b>Posted on </b> 2021-03-03 14:49:12
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="post-body" class="p-3 pb-1">
                                    <div class="post-image">
                                        <img src="./image/posts/ucsiopenday.jpg" alt="" />
                                    </div>
                                    <div id="post-content" class="pt-3">
                                        <div id="post-description">
                                            <p>
                                                Welcome back everyone! We are glad to have everyone back. 
                                                As we all know UCSI has many clubs as for you CCA. 
                                                Club day will be held on 21st of February with tons of clubs wanting you to join their clubs. 
                                                If you are interested you guys could sign up and visit the club day at the UCSI Student Council Facebook page where they will post the links to it.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <input type="text" name="id" value="C1" hidden>
                                    <div id="post-comment">
                                        <div id="post-comment-header" class="p-2">
                                            <h5>Leave a Comment</h5>
                                        </div>
                                        <div id="post-comment-body" class="p-4">
                                            <div class="name pb-2">
                                                <input type="text" class="form-control" name="name" value="" placeholder="Enter your fullname">
                                            </div>
                                            <div class="email py-2">
                                                <input type="text" class="form-control" name="email" value="" placeholder="Enter your Valid email">
                                            </div>
                                            <div class="comment py-2">
                                                <textarea name="comment" cols="30" rows="3" class="form-control" placeholder="Comment"></textarea>
                                            </div>
                                            <div class="submit pt-2">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
