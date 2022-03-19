<?php //haven't do
    require_once './dashboard_initialization.php';

    //Verification Process
    if(isset($_GET["page"]) && (isset($_GET["type"]) && ($_GET["type"] == 'show' || $_GET["type"] == 'hide')) && isset($_GET["id"])) {
        $page = $_GET["page"];
        $type = $_GET["type"];
        $id = $_GET["id"];
        
        //Processing
        executeQuery(dbConnection(), $page, $type, $id);
    }
    //Query Execution Module
    function executeQuery($conn, $page, $type, $id){
        if ($page == 'category') {
            $table = "category";
            $table_id = "category_id";
            $redirect = "../../dashboard/dashboard_category_manage.php";

        } else if ($page == 'subcategory') {
            $table = "subcategory";
            $table_id = "subcategory_id";
            $redirect = "../../dashboard/dashboard_subcategory_manage.php";

        } else if ($page == 'news') {
            $table = "news";
            $table_id = "news_id";
            if ($type == 'show') {
                $redirect = "../../dashboard/dashboard_posts_trash.php";
            } else {
                $redirect = "../../dashboard/dashboard_posts_manage.php";
            } 

        } else if ($page == 'comment') {
            $table = "comment";
            $table_id = "comment_id";
            if ($type == 'show') {
                $redirect = "../../dashboard/dashboard_comments_approval.php";
            } else {
                $redirect = "../../dashboard/dashboard_comments_approved.php";
            } 
        }

        //Query Table Size Check
        $sql = "UPDATE $table SET status='$type' WHERE $table_id='$id'";
        //Running Query
        if(mysqli_query($conn, $sql)){
            //If Succesfull
            header('Location: ' . $redirect);    
        } else {
            //Failed / Error
            header('Location: ../../dashboard/dashboard_index.php');
        }
    }  

    //Establishing Connection
    function dbConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "unipress";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);  

        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            return $conn;
        }
          
    }

    
?>