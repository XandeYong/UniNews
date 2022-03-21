<?php 
    include "./backend/connectDB.php";

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
        $email = $row["email"];
    } else {
        $title = "Contact Us";
        $desc = "UniNews is a online news website based for Universities students. 
                 So far we only partnered with 3 Universities that is UCSI, KDU and SUNWAY. 
                 The objective of this news website is that we could bring you daily updated news about your Universities and keep you up to date. 
                 There will be few categories such as clubs, campus, sports and student councils news that will be published. 
                 And of course if you guys have some opinion on the news you can comment on it. Moreover, if you have more question you can contact us at UniNews@gmail.com. 
                 Thank you.";
        $email = "UniNews@gmail.com";
    }

    $conn->close();

?>
<!-- <h2><?php //echo $title; ?></h2>
<a> <?php //echo $desc; ?></a> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Contact Us</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/contact_us.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content">
                <div id="contactus" class="container">
                    <div class="row justify-content-center py-5">
                        <div id="contactus_content" class="col col-md-8 p-3">
                            <div class="title">
                                <h3><?php echo $title; ?></h3>
                            </div>
                            <hr/>
                            <div id="contactus_body" class="px-2 py-1">
                                <p>
                                    <?php echo $desc; ?>
                                </p>
                            </div>
                            <hr/>
                            <div id="contactus_contact">
                                <p><b>Email:</b> <?php echo $email; ?></p>
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
