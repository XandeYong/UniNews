<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/About.php" ?>

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
$sql = "SELECT * FROM about";

//Executing Query
$result = $conn->query($sql);

//var
$about = new About("");

//Fetching Result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $about = new About($row["description"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Dashboard - About</title>
    <?php include "../base/dashboard/dashboard_head.php" ?>
    <link rel="stylesheet" href="../css/dashboard/dashboard_manage.css">
</head>
<body>
    
    <?php include "../base/dashboard/dashboard_sidebar.php"; ?>

    <div id="wrapper">
        <div class="container-fluid">
            <?php include "../base/dashboard/dashboard_header.php"; ?>

            <div id="content" class="row justify-content-center">
                <div id="aboutus_pages" class="col-12 col-lg-10">
                    <form action="../backend/dashboard/controlAbout.php" method="POST">
                        <div class="container mt-3">
                            
                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="title">About Us Message</label>
                                        </div>
                                        <div class="py-3">
                                            <textarea class="form-control w-100" name="description" rows="10" required><?php echo $about->get_description() ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div class="justify-content-center d-flex">
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
