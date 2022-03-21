<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/Category.php" ?>
<?php require_once "../model/Subcategory.php" ?>

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
$sql = "SELECT category_id, category FROM category WHERE status='show'";
$sql2 = "SELECT subcategory_id, subcategory FROM subcategory WHERE status='show'";

//Executing Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Category Object Array
$categoryArray_show = array();
$subcategoryArray_show = array();

//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $categoryArray_show[] = new Category($row["category_id"], $row["category"], null, null, null);
    }
}

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        $subcategoryArray_show[] = new Subcategory($row["subcategory_id"], $row["subcategory"], null, null, null, null);
    }
}

if (isset($_GET['img'])) {
    $imgError = $_GET['img'];
    $imgMsg = "";
    if ($imgError == 1) {
        $imgMsg = "Sorry, only WEBP, JPG, JPEG, PNG & GIF files are allowed.";
    } else if ($imgError == 2) {
        $imgMsg = "Sorry, your file is too large. Maximum file size: 3MB";
    } else if ($imgError == 3) {
        $imgMsg = "File is not an image.";
    } else if ($imgError == 4) {
        $imgMsg = "Sorry, there was an error uploading your file.";
    }
}

?>

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

            <div id="content" class="row justify-content-center">
                <div id="add_posts" class="col-12 col-lg-10">
                    <form action="../backend/dashboard/controlPosts.php" method="POST" enctype="multipart/form-data">
                        <div class="container mt-3">
                            <div class="row">
                                <div>
                                    <label class="w-100" for="title">Post Title</label>
                                </div>
                                <div class="mt-1">
                                    <input class="form-control input w-100 ps-2" type="text" name="title" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="title">Category</label>
                                </div>
                                <div class="mt-1">
                                    <select class="form-control input w-100" name="category" required>
                                        <option value disabled hidden selected>Select Category</option>
                                        <?php if (!empty($categoryArray_show)) {
                                            foreach ($categoryArray_show as $category) {
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

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="title">Sub Category</label>
                                </div>
                                <div class="mt-1">
                                    <select class="form-control input w-100" name="subcategory" required>
                                        <option value disabled hidden selected>Select Sub Category</option>
                                        <option value disabled>Please select a Category</option>
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
                                            <textarea class="form-control w-100" name="detail" rows="2" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="feature_image">Feature Image</label>
                                        </div>
                                        <div class="py-3">
                                            <input class="input w-100 p-2" type="file" name="feature_image">
                                            <?php 
                                                if (isset($_GET['img'])) {
                                                    ?>
                                            <div class="error c-red">
                                                <?php echo $imgMsg; ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div>
                                    <button class="btn btn-sm btn-success" type="submit" name="submit" value="add">Save and Post</button>
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
    <script src="../js/dashboard/dashboard_post.js"></script>

</body>
</html>
