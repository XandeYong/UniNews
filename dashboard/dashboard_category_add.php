<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Dashboard</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_add.css">
</head>
<body>
    
    <?php include "../base/dashboard/dashboard_sidebar.php"; ?>

    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/dashboard/dashboard_header.php"; ?>

            <div id="content" class="row">
                <div id="add_category" class="col-12 add_category form-border">
                    <form action="" method="POST">
                        <div class="content-header">
                            <div class="row px-3 py-2 title">
                                <h5>Add Category</h5>
                            </div>
                        </div>
                        <div class="content-body container">
                            <div class="row row-cols-1 row-cols-lg-2 pt-4 pb-2">
                                <div class="col col-lg-2 text-lg-end">
                                    <label for="category">Category</label>
                                </div>
                                <div class="category col col-lg-6 mt-2 mt-lg-0">
                                    <input class="input w-100" type="text" name="category" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-2 text-lg-end">
                                    <label for="category-desc">Category Description</label>
                                </div>
                                <div class="category-desc col col-lg-6 mt-2 mt-lg-0">
                                    <textarea class="input w-100" name="category-desc" value="" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 pt-1 pb-4">
                                <div class="col col-lg-2"></div>
                                <div class="category-desc col col-lg-6">
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../base/dashboard/dashboard_script.php" ?>

</body>
</html>
