<?php    

    $curPath = basename($_SERVER["SCRIPT_NAME"]); 

    //0:url, 1:title, 2:sitemap_current, 3:(sitemap_parent, link), 4:(sitemap_grand, link)
    $pages = array(
        array("dashboard_index.php", "Dashboard", "Dashboard", 
            array("Admin", "./dashboard_index.php"), 
            array("UniPress", "../index.php")
        ),

        array("dashboard_category_add.php", "Add Category", "Add Category", 
            array("Category", "./dashboard_category_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_category_manage.php", "Manage Categories", "Manage Categories", 
            array("Category", "./dashboard_category_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_subcategory_add.php", "Add SubCategory", "Add Subcategory", 
            array("Subcategory", "./dashboard_subcategory_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_subcategory_manage.php", "Manage SubCategories", "Manage Subcategories", 
            array("Subcategory", "./dashboard_subcategory_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_posts_add.php", "Add Post", "Add Post", 
            array("Posts", "./dashboard_posts_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_posts_manage.php", "Manage Posts", "Manage Posts", 
            array("Posts", "./dashboard_posts_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_posts_trash.php", "Trashed Posts", "Trashed Posts", 
            array("Posts", "./dashboard_posts_add.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_pages_contactus.php", "Contact us Page", "Contact us", 
            array("Pages", "./dashboard_pages_contactus.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_pages_aboutus.php", "About us Page", "About us", 
            array("Pages", "./dashboard_pages_contactus.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_comments_approval.php", "Manage Unapproved Comments", "Unapproved Comments", 
            array("Comments", "./dashboard_comments_approval.php"), 
            array("Admin", "./dashboard_index.php")
        ),

        array("dashboard_comments_approved.php", "Manage Approved Comments", "Approved Comments", 
            array("Comments", "./dashboard_comments_approval.php"), 
            array("Admin", "./dashboard_index.php")
        ),
    );

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
                        
    $headerTitle;
    $sitemap_current;
    $sitemap_parent;
    $sitemap_parent_link;
    $sitemap_grandparent;
    $sitemap_grandparent_link;

    foreach ($pages as $page) {
        if ($curPath == $page[0]) {
            $headerTitle = $page[1];
            $sitemap_current = $page[2];
            $sitemap_parent = $page[3][0];
            $sitemap_parent_link = $page[3][1];
            $sitemap_grandparent = $page[4][0];
            $sitemap_grandparent_link = $page[4][1];
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
                <a href="<?php echo $sitemap_grandparent_link; ?>" class="path"><?php echo $sitemap_grandparent; ?></a>
                <div>/</div>
                <a href="<?php echo $sitemap_parent_link; ?>" class="path"><?php echo $sitemap_parent; ?></a>
                <div>/</div>
                <span class="path"><?php echo $sitemap_current; ?></span>
            </span>
        </div>
    </div>
</div>