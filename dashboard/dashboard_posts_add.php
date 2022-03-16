<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniNews | Dashboard</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_add.css">
</head>
<body>
    
    <?php include "../base/dashboard/dashboard_sidebar.php"; ?>

    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/dashboard/dashboard_header.php"; ?>

            <div id="content" class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <form action="" method="POST">
                        <div class="container mt-3">
                            <div class="row">
                                <div>
                                    <label class="w-100" for="title">Post Title</label>
                                </div>
                                <div class="mt-1">
                                    <input class="input w-100 ps-2" type="text" name="title" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="title">Category</label>
                                </div>
                                <div class="mt-1">
                                    <select class="input w-100" name="category" required>
                                        <option value disabled hidden>Select Category</option>
                                        <option value="UCSI University">UCSI University</option>
                                        <option value="TARUC University">TARUC University</option>
                                        <option value="UTAR University">UTAR University</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="title">Sub Category</label>
                                </div>
                                <div class="mt-1">
                                    <select class="input w-100" name="category" required>
                                        <option value disabled hidden>Select Sub Category</option>
                                        <option value="UCSI Campus">UCSI Campus</option>
                                        <option value="TARUC Campus">TARUC Campus</option>
                                        <option value="UTAR Campus">UTAR Campus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="title">Post Details</label>
                                        </div>
                                        <div class="py-3">
                                            <textarea class="w-100" name="detail" rows="2" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="title">Feature Image</label>
                                        </div>
                                        <div class="py-3">
                                            <input class="input w-100 p-2" type="file" name="title" placeholder="Enter title">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div>
                                    <button class="btn btn-sm btn-success" type="submit" name="submit" value="submit">Save and Post</button>
                                    <button class="btn btn-sm btn-danger ms-1" type="reset">Discard</button>
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
