<?php 
    //DB Variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uninews";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);  

    //Check Connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Query
    $sql = "SELECT * FROM about";

    //Running Query
    $result = $conn->query($sql);

    //Creating Class Based On Result
    if($result->num_rows > 0){
        $row = $result -> fetch_assoc();

        //Setting Into Variables
        $desc = $row["description"];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | About</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="row">
                <?php echo $aboutUs; ?>
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdILvkMWaWTOAXwYKrCq6808s_22IhUc7hgMgCP2Yn3ecpgAQ/viewform?embedded=true" width="640" height="1170" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div>

        </div>
    </div>

    <?php include "./base/footer.php" ?>
    <?php include "./base/script.php" ?>    

</body>
</html>
