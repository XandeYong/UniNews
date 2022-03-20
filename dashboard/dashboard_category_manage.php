<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/Category.php" ?>

<?php
//Establishing Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipress";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query
$sql = "SELECT * FROM category WHERE status='show'";
$sql2 = "SELECT * FROM category WHERE status='hide'";

//Executing Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Category Object Array
$categoryArray_show = array();
$categoryArray_hide = array();

//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $categoryArray_show[] = new Category($row["category_id"], $row["category"], $row["description"], $row["datetime"], $row["last_modify"]);
    }
}

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        $categoryArray_hide[] = new Category($row["category_id"], $row["category"], $row["description"], $row["datetime"], $row["last_modify"]);
    }
}
?>

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
                                    <?php if (!empty($categoryArray_show)) {
                                        $count = 1;
                                        foreach ($categoryArray_show as $category) {
                                    ?>
                                        <tr id="<?php echo $category->get_categoryID() ?>">
                                            <th scope="row"><?php echo $count++ ?></th>
                                            <td><?php echo $category->get_category() ?></td>
                                            <td><?php echo $category->get_categoryDesc() ?></td>
                                            <td class="text-center"><?php echo $category->get_categoryDate() ?></td>
                                            <td class="text-center">
                                                <?php if (!empty($category->get_categoryDateModify())) {
                                                    echo $category->get_categoryDateModify();
                                                } ?>
                                            </td>
                                            <td class="action">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_category_modal">
                                                        <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                                    </button>
                                                    <a href="../backend/dashboard/updateStatus.php?page=category&type=hide&id=<?php echo $category->get_categoryID() ?>" class="delete borderless backgroundless p-0" title="delete">
                                                        <i class="ico ico-sm ico-red ico-trash mx-auto"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <tr id="">
                                        <td colspan="6">
                                            <h5 class="c-red text-center">No record found</h5>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
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
                                    <?php if (!empty($categoryArray_hide)) {
                                        $count = 1;
                                        foreach ($categoryArray_hide as $category) {
                                    ?>
                                    <tr id="<?php echo $category->get_categoryID() ?>">
                                        <th scope="row"><?php echo $count++ ?></th>
                                        <td><?php echo $category->get_category() ?></td>
                                        <td><?php echo $category->get_categoryDesc() ?></td>
                                        <td class="text-center"><?php echo $category->get_categoryDate() ?></td>
                                        <td class="text-center">
                                            <?php if (!empty($category->get_categoryDateModify())) {
                                                echo $category->get_categoryDateModify();
                                            } ?>
                                        </td>
                                        <td class="action">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_category_modal">
                                                    <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                                </button>
                                                <a href="../backend/dashboard/updateStatus.php?page=category&type=show&id=<?php echo $category->get_categoryID() ?>" class="recover borderless backgroundless p-0" title="recover">
                                                    <i class="ico ico-sm ico-green ico-arrow-clockwise mx-auto"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <tr id="">
                                        <td colspan="6">
                                            <h5 class="c-red text-center">No record found</h5>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>

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
                <form action="../backend/dashboard/controlCategory.php" method="POST">
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
                                    <input class="form-control form-control-sm input w-100" type="text" name="category" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end">
                                    <label for="category-desc">Category Description</label>
                                </div>
                                <div class="category-desc col col-lg-8 mt-2 mb-3 mt-lg-0">
                                    <textarea class="form-control form-control-sm input w-100" name="category-desc" value="" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="edit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>