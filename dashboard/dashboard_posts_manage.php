<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/News.php" ?>
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
$sql = "SELECT N.news_id, N.title, CA.category, S.subcategory FROM news N, category CA, subcategory S 
        WHERE N.status='show' AND N.category_id = CA.category_id AND N.subcategory_id = S.subcategory_id 
        ORDER BY N.datetime ASC;";

$sql2 = "SELECT category_id, category FROM category WHERE status='show'";

//Executing Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Category Object Array
$postArray = array();
$categoryArray = array();

//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $postArray[] = new News($row["news_id"], $row["title"], null, null, null, $row["category"], $row["subcategory"], null);
    }
}

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        $categoryArray[] = new Category($row["category_id"], $row["category"], null, null, null);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Post</title>
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
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-start">Title</th>
                                    <th scope="col" class="text-start">Category</th>
                                    <th scope="col" class="text-start">Subcategory</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($postArray)) {
                                    $count = 1;
                                    foreach ($postArray as $post) {
                                ?>
                                    <tr id="<?php echo $post->get_newsID() ?>">
                                        <th scope="row"><?php echo $count++ ?></th>
                                        <td><?php echo $post->get_title(); ?></td>
                                        <td><?php echo $post->get_category(); ?></td>
                                        <td><?php echo $post->get_subcategory() ?></td>
                                        <td class="action">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <button class="edit borderless backgroundless p-0 me-1" title="edit" data-bs-toggle="modal" data-bs-target="#update_post_modal">
                                                    <i class="ico ico-sm ico-blue ico-edit mx-auto"></i>
                                                </button>
                                                <a href="../backend/dashboard/updateStatus.php?page=news&type=hide&id=<?php echo $post->get_newsID(); ?>" class="delete borderless backgroundless p-0" title="delete">
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
                                        <td colspan="4">
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

    <?php include_once "../base/dashboard/dashboard_script.php" ?>
    <script src="../js/dashboard/dashboard_manage.js"></script>
    <script src="../js/dashboard/dashboard_post.js"></script>

    <div class="modal modal-md fade" id="update_post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Update Post Modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../backend/dashboard/controlPosts.php" method="POST">
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
                                    <input class="form-control form-control-sm input w-100" type="text" name="title" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end">
                                    <label for="category">Category</label>
                                </div>
                                <div class="category col col-lg-8 mt-2 mt-lg-0 d-flex align-items-center">
                                    <select name="category" class="form-control form-control-sm input w-100" required>
                                        <option hidden disabled selected value>Select a Category</option>
                                        <?php if (!empty($categoryArray)) {
                                            foreach ($categoryArray as $category) {
                                        ?>
                                            <option value="<?php echo $category->get_categoryID(); ?>"><?php echo $category->get_category(); ?></option>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                            <option disabled value="">No Category Found</option>
                                        <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-3 text-lg-end d-flex">
                                    <label for="subcategory">Subcategory</label>
                                </div>
                                <div class="subcategory col col-lg-8 mt-2 mt-lg-0 d-flex align-items-center">
                                    <select name="subcategory" class="form-control form-control-sm input w-100" required>
                                        <option hidden disabled selected value>Select a Subcategory</option>
                                        <option disabled value="">No Subcategory Found</option>
                                    </select>
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
