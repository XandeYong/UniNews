<?php
    require_once './dashboard_initialization.php';

    //Verification Process
    if(isset($_POST["description"])) {
        $description = $_POST["description"];
        
        //Processing
        executeQuery(dbConnection(), $description);                                    
    } else {
        header('Location: ../../dashboard/dashboard_pages_aboutus.php?error=true');
    }

    //Query Execution Module
    function executeQuery($conn, $description) {
        $sql = "SELECT * FROM about";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $sql = "UPDATE about SET description = '$description'";
        } else {
            $sql = "INSERT INTO about (description) VALUES ('$description')";
        }

        //Validate Insert Query
        if (mysqli_query($conn, $sql)) {
            //If Succesfull
            header('Location: ../../dashboard/dashboard_pages_aboutus.php');
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