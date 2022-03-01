<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniNews | Admin Login</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/admin_login.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="row">
                <div class="container">
                    <div class="row justify-content-center">
                        <div id="login-model" class="col-10 col-sm-6 col-md-6 col-lg-3">
                            <form action="./backend/login.php" method="post">
                                <div id="l-m-header" class="row">
                                    <div class="text-center">
                                        <h5>NEWS PORTAL</h5>
                                        <h6>Admin login</h6>
                                    </div>
                                </div>

                                <div id="l-m-body" class="row justify-content-center pt-4 pb-3">
                                    <div id="email-txt" class="col-10 mb-3">
                                        <input type="text" name="username" class="w-100" placeholder="Username">
                                    </div>
                                    
                                    <div id="password-txt" class="col-10 mb-3">
                                        <input type="text" name="password" class="w-100" placeholder="Password">
                                    </div>

                                    <div id="login-btn" class="col-10 text-center">
                                        <input type="submit" name="login" value="Log In">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "./base/footer.php" ?>
    <?php include "./base/script.php" ?>    

</body>
</html>
