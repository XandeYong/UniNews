<script src="../vendor/jquery/jquery-3.6.0.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.js"></script>
<script src="../js/dashboard/dashboard_master.js"></script>

<script>
        
    </script>
<?php
    $curPath = basename($_SERVER["SCRIPT_NAME"]);
    $pathList = array("dashboard" => "dashboard_index.php", 
                        "category_add" => "dashboard_category_add.php", 
                        "category_manage" => "dashboard_category_manage.php",
                        "subcategory_add" => "dashboard_subcategory_add.php",
                        "subcategory_manage" => "dashboard_subcategory_manage.php",
                        "posts_add" => "dashboard_posts_add.php",
                        "posts_manage" => "dashboard_posts_manage.php",
                        "posts_trash" => "dashboard_posts_trash.php",
                        "pages_contactus" => "dashboard_pages_contactus.php",
                        "pages_aboutus" => "dashboard_pages_aboutus.php",
                        "comments_approval" => "dashboard_comments_approval.php",
                        "comments_approved" => "dashboard_comments_approved.php");
    
    foreach ($pathList as $id => $path) {
        if ($curPath == $path) {
            echo "<script>active_page('$id');</script>";
        }
    }
?>

