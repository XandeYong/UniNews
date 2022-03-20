<?php require_once "./model/News.php" ?>
<?php require_once "./model/Category.php" ?>

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
$sql = "SELECT N.*, CA.category FROM news N, category CA 
        WHERE N.status='show' 
        AND N.category_id = CA.category_id 
        ORDER BY N.datetime DESC";

$sql2 = "SELECT * FROM category WHERE status = 'show'
        ORDER BY datetime DESC";


//Executing Query
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

//Category Object Array
$posts = array();
$posts_category = array();
$categories = array();


//Fetching Result
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $posts[] = new News($row["news_id"], $row["title"], null, $row["image"], null, $row["datetime"], $row["category"], null, null);
        array_push($posts_category, $row["category_id"]);
    }
}

if ($result2->num_rows > 0) {

    while ($row = $result2->fetch_assoc()) {
        $categories[] = new Category(null, $row["category"], null, null, null, null, null);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniPress | News</title>
    <?php include "./base/head.php" ?>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/sidenav.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <?php include "./base/navbar.php" ?>

            <div id="content" class="">
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div id="posts-section" class="col-12 col-lg-6">
                            <?php if (!empty($posts)) {
                                $i = 0;
                                foreach ($posts as $post) {
                            ?>
                            <div class="posts mb-4">
                                <div class="posts-body">
                                    <div class="posts-image">
                                        <img src="./image/posts/<?php echo $post->get_image(); ?>" alt="post image" />
                                    </div>
                                    <div class="posts-content px-3 py-1">
                                        <div class="posts-title">
                                            <h3><?php echo $post->get_title(); ?></h3>
                                        </div>
                                        <div class="posts-category">
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="./index.php?category=<?php echo $posts_category[$i++] ?>"><?php echo $post->get_category(); ?></a>
                                            </span>
                                        </div>
                                        <div class="posts-link pt-2 pb-3">
                                            <a class="btn btn-primary" href="./news.php?id=<?php echo $post->get_newsID(); ?>">
                                                <span class="d-flex align-items-center">
                                                    Read More <i class="ico ico-sm ico-white ico-arrow-right ms-1 me-0"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="posts-footer">
                                    <div class="posts-footer-content p-2">
                                        Posted on <?php echo $post->get_datetime(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                            ?>
                                <h5 class="c-red text-center">No record found</h5>
                            <?php 
                            }
                            ?>
<!-- 
                            <div class="posts mb-4">
                                <div class="posts-body">
                                    <div class="posts-image">
                                        <img src="./image/posts/ucsiopenday.jpg" alt="" />
                                    </div>
                                    <div class="posts-content px-3 py-1">
                                        <div class="posts-title">
                                            <h3>UCSI Open Day</h3>
                                        </div>
                                        <div class="posts-category">
                                            <span>
                                                <b>Category :</b> 
                                                <a class="text-decoration-none" href="#">UCSI University</a>
                                            </span>
                                        </div>
                                        <div class="posts-link pt-2 pb-3">
                                            <a class="btn btn-primary" href="#">
                                                <span class="d-flex align-items-center">
                                                    Read More <i class="ico ico-sm ico-white ico-arrow-right ms-1 me-0"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="posts-footer">
                                    <div class="posts-footer-content p-2">
                                        Posted on 2021-03-24 14:26:10
                                    </div>
                                </div>
                            </div> -->
                            
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
