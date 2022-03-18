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
    $sql = "SELECT * FROM contact_us";

    //Running Query
    $result = $conn->query($sql);

    //Creating Class Based On Result
    if($result->num_rows > 0){
        $row = $result -> fetch_assoc();

        //Setting Into Variables
        $title = $row["title"];
        $desc = $row["description"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Contact Us</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="row">
                <h2><?php echo $title; ?></h2>
                <a> <?php echo $desc; ?></a>
            </div>

        </div>
    </div>

    <?php include "./base/footer.php" ?>
    <?php include "./base/script.php" ?>    

</body>
</html>
