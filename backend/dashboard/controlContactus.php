<?php
    require_once './dashboard_initialization.php';

    //Verification Process
    if(isset($_POST["title"]) && isset($_POST["detail"]) && isset($_POST["email"])) {
        $title = $_POST["title"];
        $description = $_POST["detail"];
        $email = $_POST["email"];
        
        //Processing
        executeQuery(dbConnection(), $title, $description, $email);                                    
    } else {
        header('Location: ../../dashboard/dashboard_category_add.php?error=true');
    }

    //Query Execution Module
    function executeQuery($conn, $title, $description, $email) {

        //Query Insert Into Category
        $sql = "INSERT INTO Contact_us (title, description, email) VALUES ('$title', '$description', '$email')";

        //Validate Insert Query
        if (mysqli_query($conn, $sql)) {
            //If Succesfull
            header('Location: ../../dashboard/dashboard_pages_contactus.php');
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