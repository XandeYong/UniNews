<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Dashboard</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_index.css">
</head>
<body>
    
    <?php include "../base/dashboard/dashboard_sidebar.php"; ?>

    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/dashboard/dashboard_header.php"; ?>

            <div id="content" class="row">

                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">CATEGORIES LISTED</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4><?php echo executeQuery("category", 0); ?></h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">SUBCATEGORIES LISTED</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4><?php echo executeQuery("subcategory", 0); ?></h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">LIVE NEWS</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4><?php echo executeQuery("news", 1); ?></h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">TRASHED NEWS</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4><?php echo executeQuery("news", 2); ?></h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../base/dashboard/dashboard_script.php" ?>

</body>
</html>

<?php
    
    //Query Execution
    function executeQuery($table, $status){
        //Status 0 = Normal query with no status filtering.
        //Status 1 = Query with status filtering where news' status = true.
        //Status 2 = Query with status filtering where news' status = false.

        //Establishing Connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uninews";

        //Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);  

        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Query 
        if($status == 0){
            $sql = "SELECT * FROM $table";
        }else if($status == 1){
            $sql = "SELECT * FROM $table WHERE status = 'true'";
        }else if($status == 2){
            $sql = "SELECT * FROM $table WHERE status = 'false'";
        }
        

        //Running Query
        $result = $conn->query($sql);

        //Creating class based on result
        if($result->num_rows > 0){
            return $result -> num_rows;       
        }else{
             return 0;
        }

        //Close connection
        $conn->close();
    }
?>
