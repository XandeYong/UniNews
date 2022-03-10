<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniNews | Dashboard</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_index.css">
</head>
<body>
    
<?php
    require_once('../model/Account.php');

    //Retreiving sessiond data
    session_start();
    if(isset($_SESSION["account"])){
        $loginAccount = unserialize($_SESSION["account"]);

        //Class data output testing
        echo $loginAccount->get_username();
    }else{

    }
    
?>
    
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
                            <h4>2</h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">CATEGORIES LISTED</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4>2</h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">CATEGORIES LISTED</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4>2</h4>
                            <i class="ico ico-color-dashboard ico-unipress"></i>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 item">
                    <div class="item-content">
                        <div class="row">
                            <span class="title text-nowrap">CATEGORIES LISTED</span>
                        </div>
                        <div class="d-flex justify-content-between state">
                            <h4>2</h4>
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
