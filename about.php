<?php 
    include "./backend/connectDB.php";

    //Query
    $sql = "SELECT * FROM about";

    //Running Query
    $result = $conn->query($sql);

    //Creating Class Based On Result
    if($result->num_rows > 0){
        $row = $result -> fetch_assoc();

        //Setting Into Variables
        $aboutUs = $row["description"];
    }

    $conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | About</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/about.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content">
                <div id="aboutus" class="container">
                    <div class="row justify-content-center py-4">
                        <div class="col-12 col-md-8">
                            <div id="aboutus_title">
                                <h2>About UniPress Bulletin</h2>
                            </div>
                            <div id="sitemap" class="p-1">
                                <div class="path p-2">
                                    <span><a href="./index.php">Home</a></span>
                                    <span>/</span>
                                    <span>About</span>
                                </div>
                            </div>
                            <div id="aboutus_content" class="py-4">
                                <p>
                                    <?php echo $aboutUs; ?>
                                </p>
                            </div>
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
