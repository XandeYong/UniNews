<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/Contact_us.php" ?>

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
$sql = "SELECT * FROM contact_us";

//Executing Query
$result = $conn->query($sql);

//var
$contactus = new Contact_us("", "", "");

//Fetching Result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contactus = new Contact_us($row["title"], $row["description"], $row["email"]);
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

            <div id="content" class="row justify-content-center">
                <div id="ccontactus_pages" class="col-12 col-lg-10">
                    <form action="../backend/dashboard/controlContactus.php" method="POST">
                        <div class="container mt-3">
                            <div class="row">
                                <div>
                                    <label class="w-100" for="title">Page Title</label>
                                </div>
                                <div class="mt-1">
                                    <input class="form-control input w-100 ps-2" type="text" name="title" value="<?php echo $contactus->get_title() ?>" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <div class="form-border px-4">
                                        <div class="pt-2">
                                            <label class="w-100" for="title">Page Details</label>
                                        </div>
                                        <div class="py-3">
                                            <textarea class="form-control w-100" name="detail" rows="2" required><?php echo $contactus->get_description() ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div>
                                    <label class="w-100" for="email">Email</label>
                                </div>
                                <div class="mt-1">
                                    <input class="form-control input w-100 ps-2" type="text" name="email" value="<?php echo $contactus->get_email() ?>" placeholder="Enter Email Address" required>
                                </div>
                            </div>

                            <div class="row mt-3 mb-5">
                                <div>
                                    <button class="btn btn-sm btn-success" type="submit" name="submit" value="add">Update</button>
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
