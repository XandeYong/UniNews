<?php //haven't do
    require_once './dashboard_initialization.php';

    //Verification Process
    if(isset($_GET['page']) && isset($_GET["id"])) {
        $page = $_GET["page"];
        $id = $_GET["id"];
        
        //Processing
        executeQuery(dbConnection(), $page, $id);
    }
    //Query Execution Module
    function executeQuery($conn, $page, $id){
        $table = "comment";
        $table_id = "comment_id";

        if ($page == 'comment_approval') {
            $redirect = "../../dashboard/dashboard_comments_approval.php";
        } else {
            $redirect = "../../dashboard/dashboard_comments_approved.php";
        }


        //Query Table Size Check
        $sql = "DELETE FROM $table WHERE $table_id='$id'";
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