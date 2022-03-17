<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Dashboard</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_manage.css">
</head>
<body>
    
    <?php include "../base/dashboard/dashboard_sidebar.php"; ?>

    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/dashboard/dashboard_header.php"; ?>

            <div id="content" class="row justify-content-center">
                <div id="ccontactus_pages" class="col-12 col-lg-10">
                    <form action="" method="POST">
                        <div class="container mt-3">
                            <div class="row">
                                <div>
                                    <label class="w-100" for="title">Page Title</label>
                                </div>
                                <div class="mt-1">
                                    <input class="input w-100 ps-2" type="text" name="title" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="title">Page Details</label>
                                        </div>
                                        <div class="py-3">
                                            <textarea class="w-100" name="detail" rows="2" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="email">Email</label>
                                </div>
                                <div class="mt-1">
                                    <input class="input w-100 ps-2" type="text" name="email" placeholder="Enter Email Address" required>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div>
                                    <button class="btn btn-sm btn-success" type="submit" name="submit" value="submit">Update and Post</button>
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
