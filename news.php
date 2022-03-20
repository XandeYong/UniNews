<?php require_once "./model/News.php" ?>
<?php require_once "./model/Comment.php" ?>

<?php
if (isset($_GET['id'])) {
    $newsID = $_GET['id'];
} else {
    header('Location: ./index.php');
}

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
$sql = "SELECT N.*, CA.category, S.subcategory FROM news N, category CA, subcategory S 
        WHERE N.status='show' 
        AND N.category_id = CA.category_id 
        AND N.subcategory_id = S.subcategory_id 
        AND N.news_id = '$newsID' 
        ORDER BY N.datetime ASC";

$sql2 = "SELECT * FROM comment WHERE status = 'approved' AND news_id = '$newsID'";


//Executing Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Category Object Array
$post;
$comments = array();

//Fetching Result

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        $comments[] = new Comment(null, $row["name"], null, $row["content"], null, $row["datetime"], null);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | News</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/sidenav.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div id="post-section" class="col-12 col-lg-6">
                            <?php 
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc()
                            ?>
                            <div id="post" class="mb-4">
                                <div id="post-header" class="p-3">
                                    <div class="row">
                                        <h3><?php echo $row['title'];  ?></h3>
                                    </div>
                                    <div id="post-reference" class="row">
                                        <div>
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="./index.php?category=<?php echo $row['category_id'];  ?>"><?php echo $row['category'];  ?></a>
                                            </span>
                                            <span>|</span>
                                            <span>
                                                <b>Sub Category :</b> 
                                                <a class="text-decoration-none" href="./index.php?subcategory=<?php echo $row['subcategory_id'];  ?>"><?php echo $row['subcategory'];  ?></a>
                                            </span>
                                            <span>
                                                <b>Posted on </b> <?php echo $row['datetime']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div id="post-body" class="p-3 pb-1">
                                    <div class="post-image">
                                        <img src="./image/posts/<?php echo $row['image']; ?>" alt="Post Image" />
                                    </div>
                                    <div id="post-content" class="pt-3">
                                        <div id="post-description">
                                            <p>
                                                <?php echo $row['description'];  ?>
                                                Welcome back everyone! We are glad to have everyone back. 
                                                As we all know UCSI has many clubs as for you CCA. 
                                                Club day will be held on 21st of February with tons of clubs wanting you to join their clubs. 
                                                If you are interested you guys could sign up and visit the club day at the UCSI Student Council Facebook page where they will post the links to it.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form action="./backend/controlComment.php" method="POST">
                                    <input type="text" name="newsID" value="<?php echo $newsID ?>" hidden>
                                    <div id="post-comment">
                                        <div id="post-comment-header" class="p-2">
                                            <h5>Leave a Comment</h5>
                                        </div>
                                        <div id="post-comment-body" class="p-4">
                                            <div class="name pb-2">
                                                <input type="text" class="form-control" name="name" value="" placeholder="Enter your fullname">
                                            </div>
                                            <div class="email py-2">
                                                <input type="text" class="form-control" name="email" value="" placeholder="Enter your Valid email">
                                            </div>
                                            <div class="comment py-2">
                                                <textarea name="comment" cols="30" rows="3" class="form-control" placeholder="Comment"></textarea>
                                            </div>
                                            <div class="submit pt-2">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <?php } ?>

                            <div id="comment-section" class="mb-5">
                                <?php if (!empty($comments)) {
                                    foreach ($comments as $comment) {
                                ?>
                                <div class="post-user-comment p-3 mb-3">
                                    <div class="p-u-c-header d-flex justify-content-between">
                                        <div class="name">
                                            <h5><?php echo $comment->get_name(); ?></h5>
                                        </div>
                                        <div class="datetime">
                                            <b>Date:</b> <?php echo $comment->get_datetime(); ?>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="p-u-c-body">
                                        <div class="comment">
                                            <p><?php echo $comment->get_content(); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php }} ?>
                            </div>
                            
                        </div>
                        
                        <?php include "./base/sidenav.php" ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "./base/footer.php" ?>
    <?php include "./base/script.php" ?>    

</body>
</html>
