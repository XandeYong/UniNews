<?php require_once "../backend/dashboard/dashboard_initialization.php" ?>
<?php require_once "../model/Comment.php" ?>

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
$sql = "SELECT CO.*, N.title FROM comment CO, news N WHERE (CO.status='pending' OR CO.status='unapproved') AND CO.news_id = N.news_id";

//Executing Query
$result = $conn->query($sql);

//Category Object Array
$comments = array();

//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $comments[] = new Comment($row["comment_id"], $row["name"], $row["email"], $row["content"], $row["status"], $row["datetime"], $row["title"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | Comment</title>
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
                                <?php if (!empty($comments)) {
                                    $count = 1;
                                    foreach ($comments as $comment) {
                                ?>
                                <tr id="<?php echo $comment->get_commentID() ?>">
                                    <th scope="row"><?php echo $count++ ?></th>
                                    <td><?php echo $comment->get_name() ?></td>
                                    <td><?php echo $comment->get_email() ?></td>
                                    <td><?php echo $comment->get_content() ?></td>
                                    <td class="text-center"><?php echo $comment->get_status() ?></td>
                                    <td class="text-center"><?php echo $comment->get_news() ?></td>
                                    <td class="text-center"><?php echo $comment->get_datetime() ?></td>
                                    <td class="action">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="../backend/dashboard/updateStatus.php?page=comment&type=approved&id=<?php echo $comment->get_commentID() ?>" class="approve borderless backgroundless p-0 me-1" title="approve">
                                                <i class="ico ico-sm ico-blue ico-thumbs-up mx-auto"></i>
                                            </a>
                                            <a href="../backend/dashboard/deleteComment.php?page=comment_approval&id=<?php echo $comment->get_commentID() ?>" class="delete borderless backgroundless p-0" title="delete">
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
                                    <td colspan="8">
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

</body>
</html>
