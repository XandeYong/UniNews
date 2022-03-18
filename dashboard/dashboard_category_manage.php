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

            <div id="content" class="row">
                <div id="manage_category" class="col-12">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div>
                                <a class="text-decoration-none" href="./dashboard_category_add.php">
                                    <button class="btn btn-success d-inline-flex align-items-center text-center">
                                        Add <i class="ico ico-sm ico-white ico-plus-circle ms-1 mx-auto"></i>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="row mt-4 table-responsive">
                            <table id="exist_category" class="table table-hover border-3 border-primary border-radius-4px borderless-tbody-last">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="text-start">Category</th>
                                        <th scope="col" class="text-start">Description</th>
                                        <th scope="col" class="text-center">Pending Date</th>
                                        <th scope="col" class="text-center">Last Updation Date</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="C1">
                                        <th scope="row">1</th>
                                        <td>UCSI University</td>
                                        <td>News Regarding UCSI University</td>
                                        <td class="text-center">2021-03-01 12:16:58</td>
                                        <td class="text-center">2021-03-01 12:16:58</td>
                                        <td class="action">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_category_modal">
                                                    <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                                </button>
                                                <a href="#" class="delete borderless backgroundless p-0" title="delete">
                                                    <i class="ico ico-sm ico-red ico-trash mx-auto"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-5">
                            <h5 class="d-flex align-items-center">
                                <i class="ico ico-sm ico-trash"></i>
                                Deleted Categories
                            </h5>
                        </div>

                        <div class="row mt-4 table-responsive">
                            <table id="deleted_category" class="table table-hover border-3 border-danger border-radius-4px borderless-tbody-last">
                                <thead class="bg-danger text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="text-start">Category</th>
                                        <th scope="col" class="text-start">Description</th>
                                        <th scope="col" class="text-center">Pending Date</th>
                                        <th scope="col" class="text-center">Last Updation Date</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="C2">
                                        <th scope="row">1</th>
                                        <td>UCSI University</td>
                                        <td>News Regarding UCSI University</td>
                                        <td class="text-center">2021-03-01 12:16:58</td>
                                        <td class="text-center">2021-03-01 12:16:58</td>
                                        <td class="action">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_category_modal">
                                                    <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                                </button>
                                                <a href="#" class="recover borderless backgroundless p-0" title="recover">
                                                    <i class="ico ico-sm ico-red ico-arrow-clockwise mx-auto"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr id="">
                                        <td colspan="6"><h5 class="c-red text-center">No record found</h5></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../base/dashboard/dashboard_script.php" ?>
    <script src="../js/dashboard/dashboard_manage.js"></script>

    <!-- Modal -->
    <div class="modal fade" id="update_category_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Update Category Modal" aria-hidden="true">
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
                                    <label for="category">Category</label>
                                </div>
                                <div class="category col col-lg-8 mt-2 mt-lg-0">
                                    <input class="input w-100" type="text" name="category" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end">
                                    <label for="category-desc">Category Description</label>
                                </div>
                                <div class="category-desc col col-lg-8 mt-2 mb-3 mt-lg-0">
                                    <textarea class="input w-100" name="category-desc" value="" rows="4" required></textarea>
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
