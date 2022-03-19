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
$sql = "SELECT category_id, category FROM category WHERE status='show'";
//Executing Query
$result = $conn->query($sql);

//Category Object Array
$categoryArray_show = array();

//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $categoryArray_show[] = new Category($row["category_id"], $row["category"], null, null, null);
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

            <div id="content" class="row">
                <div id="add_subcategory" class="col-12 add_category form-border">
                    <form action="../backend/dashboard/addSubcategory.php" method="POST">
                        <div class="content-header">
                            <div class="row px-3 py-2 title">
                                <h5>Add SubCategory</h5>
                            </div>
                        </div>
                        <div class="content-body container">
                            <div class="row row-cols-1 row-cols-lg-2 pt-4 pb-2">
                                <div class="col col-lg-2 text-lg-end">
                                    <label for="category">Category</label>
                                </div>
                                <div class="category col col-lg-6 mt-2 mt-lg-0">
                                    <select name="category" class="category input w-100" required>
                                        <option hidden disabled selected value>Select a category</option>
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

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-2 text-lg-end">
                                    <label for="category">Sub Category</label>
                                </div>
                                <div class="category col col-lg-6 mt-2 mt-lg-0">
                                    <input class="input w-100" type="text" name="subcategory" value="" required>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2 py-2">
                                <div class="col col-lg-2 text-lg-end">
                                    <label for="category-desc">Sub Category Description</label>
                                </div>
                                <div class="category-desc col col-lg-6 mt-2 mt-lg-0">
                                    <textarea class="input w-100" name="subcategory-desc" value="" rows="4" required></textarea>
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
