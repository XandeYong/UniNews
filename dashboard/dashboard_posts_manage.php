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

            <div id="content" class="row p-3">
                <div id="manage_posts" class="col-12 form-border">
                    <div class="row p-3 table-responsive">
                        <table class="table table-hover border-radius-4px borderless-tbody-last">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col" class="text-start">Title</th>
                                    <th scope="col" class="text-start">Category</th>
                                    <th scope="col" class="text-start">Subcategory</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="P1">
                                    <td>USCI SPORT DAY</td>
                                    <td>UCSI University</td>
                                    <td>UCSI Campus</td>
                                    <td class="action">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_post_modal">
                                                <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                            </button>
                                            <button class="delete borderless backgroundless p-0" title="delete">
                                                <i class="ico ico-sm ico-red ico-trash mx-auto"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr id="P2">
                                    <td>USCI SPORT DAY</td>
                                    <td>UCSI University</td>
                                    <td>UCSI Campus</td>
                                    <td class="action">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_post_modal">
                                                <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                            </button>
                                            <button class="delete borderless backgroundless p-0" title="delete">
                                                <i class="ico ico-sm ico-red ico-trash mx-auto"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <tr id="">
                                    <td colspan="4"><h5 class="c-red text-center">No record found</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../base/dashboard/dashboard_script.php" ?>
    <script src="../js/dashboard/dashboard_manage.js"></script>

    <div class="modal modal-md fade" id="update_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Update Post Modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <input type="text" name="id" value="" hidden>
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row row-cols-1 row-cols-lg-2 pt-4 pb-2">
                                <div class="col col-lg-3 text-lg-end">
                                    <label for="title">Title</label>
                                </div>
                                <div class="title col col-lg-8 mt-2 mt-lg-0 d-flex align-items-center">
                                    <input class="input w-100" type="text" name="title" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end">
                                    <label for="category">Category</label>
                                </div>
                                <div class="category col col-lg-8 mt-2 mt-lg-0 d-flex align-items-center">
                                    <select name="category" class="input w-100" required>
                                        <option hidden disabled selected value>Select a category</option>
                                        <option value="UCSI University">UCSI University</option>
                                        <option value="TARUC University">TARUC University</option>
                                        <option value="UTAR University">UTAR University</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end d-flex">
                                    <label for="subcategory">Sub Category</label>
                                </div>
                                <div class="subcategory col col-lg-8 mt-2 mt-lg-0 d-flex align-items-center">
                                    <select name="subcategory" class="input w-100" required>
                                        <option hidden disabled selected value>Select a category</option>
                                        <option value="UCSI Campus">UCSI Campus</option>
                                        <option value="TARUC Campus">TARUC Campus</option>
                                        <option value="UTAR Campus">UTAR Campus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
