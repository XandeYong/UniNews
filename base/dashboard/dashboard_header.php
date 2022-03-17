<?php    

    $curPath = basename($_SERVER["SCRIPT_NAME"]); 
    $title = array("Dashboard" => "dashboard_index.php", 
                        "Add Category" => "dashboard_category_add.php", 
                        "Manage Categories" => "dashboard_category_manage.php",
                        "Add SubCategory" => "dashboard_subcategory_add.php",
                        "Manage SubCategories" => "dashboard_subcategory_manage.php",
                        "Add Post" => "dashboard_posts_add.php",
                        "Manage Posts" => "dashboard_posts_manage.php",
                        "Trashed Posts" => "dashboard_posts_trash.php",
                        "Contact us Page" => "dashboard_pages_contactus.php",
                        "About us Page" => "dashboard_pages_aboutus.php",
                        "Manage Unapproved Comments" => "dashboard_comments_approval.php",
                        "Manage Approved Comments" => "dashboard_comments_approved.php");

    foreach ($title as $key=> $path) {
        if ($curPath == $path) {
            $headerTitle = $key;
        }
    }

    
?>

<div id="header" class="row">
    <div id="header-1" class="d-flex">
        <div id="header-section-1" class="col d-flex justify-content-start align-items-center ">
            <div id="menu" class="">
                <a href="#">
                    <i class="ico ico-menu"></i>
                </a>
            </div>
        </div>
        <div id="header-section-2" class="col d-flex justify-content-end align-items-center">
            <div id="account">
                <div id="account-icon">
                    <a id="account-frame" href="#" class="" >
                        <img class="unselectable" src="../image/account/Profile.png" alt="Account Image">
                    </a>

                    <div id="account-dropdown" class="hide">
                        <div id="account-dropdown-box">
                            <div id="account-header" class="account-box">
                                <h6 id="account-name"><?php echo $loginAccount->get_username(); ?></h6>
                            </div>
                            <div id="account-body" class="account-box">
                                <a href="#">
                                    <div id="account-chgpass" class="account-item">
                                        <h6><i class="ico ico-gear"></i>Change Password</h6>
                                    </div>
                                </a>
                                
                                <a href="../backend/logout.php">
                                    <div id="account-logout" class="account-item">
                                        <h6><i class="ico ico-power"></i>Logout</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="header-2" class="row d-flex">
        <div id="header-title" class="col">
            <h4><?php echo $headerTitle; ?></h4>
        </div>

        <div id="page-path" class="col justify-content-sm-end">
            <span class="d-flex">
                <a href="../index.php" class="path">UniPress</a>
                <div>/</div>
                <a href="#" class="path">Admin</a>
                <div>/</div>
                <span class="path">Dashboard</span>
            </span>
        </div>
    </div>
</div>