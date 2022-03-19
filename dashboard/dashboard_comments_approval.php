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
                <div id="approval_comments" class="col-12">
                    <div class="row mt-4 table-responsive">
                        <table id="exist_category" class="table table-hover border-3 border-primary border-radius-4px borderless-tbody-last">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-start">Name</th>
                                    <th scope="col" class="text-start">Email ID</th>
                                    <th scope="col" class="text-start">Comment</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Post / News</th>
                                    <th scope="col" class="text-center">Pending Date</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="S1">
                                    <th scope="row">1</th>
                                    <td>Adrian Fong</td>
                                    <td>adrianfong@gmail.com</td>
                                    <td>Nothing can take me down!</td>
                                    <td class="text-center">Pending</td>
                                    <td class="text-center">UCSI SPORT DAY</td>
                                    <td class="text-center">2021-03-01 12:16:58</td>
                                    <td class="action">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="#" class="approve borderless backgroundless p-0 me-1" title="approve">
                                                <i class="ico ico-sm ico-blue ico-thumbs-up mx-auto"></i>
                                            </a>
                                            <a href="#" class="delete borderless backgroundless p-0" title="delete">
                                                <i class="ico ico-sm ico-red ico-trash mx-auto"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../base/dashboard/dashboard_script.php" ?>

</body>
</html>
