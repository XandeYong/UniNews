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
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/navbar.php" ?>
            <div id="navbar" class="row">
                <div class="col-1 col-sm-3">
                    
                </div>
            </div>

            <div id="content" class="row">
                
            </div>

        </div>
    </div>

</body>
</html>
