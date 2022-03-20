<?php

    require_once './dashboard_initialization.php';

    if (isset($_POST["submit"])) {
        $control = $_POST["submit"];
        //Verification Process
        if(isset($_POST["category"]) && isset($_POST["category-desc"])) {
            $category = $_POST["category"];
            $categoryDesc = $_POST["category-desc"];   
            
            //Processing
            executeQuery(dbConnection(), $control, $category, $categoryDesc);
        } else {
            header('Location: ../../dashboard/dashboard_category_add.php?error=true');
        }
    }

    //Query Execution Module
    function executeQuery($conn, $control, $category, $categoryDesc) {

        if ($control == "add") {
            //Variables 
            $categoryID = 1;
            $dateTime = date('Y-m-d H:i:s');

            //Query Table Size Check
            $sql = "SELECT * FROM category";
            //Running Query
            $result = $conn->query($sql);
            //Return Row Number Based on Result
            if($result->num_rows > 0){
                $categoryID = $result->num_rows;
                $categoryID++;
            }
            $categoryIDString = "CA" . (string)$categoryID;

            //Query Insert Into Category
            $sql = "INSERT INTO category (category_id, category, description, datetime, status) VALUES ('$categoryIDString', '$category', '$categoryDesc', '$dateTime', 'show')";

        } else if ($control == "edit" && isset($_POST["id"])) {
            $category_id = $_POST["id"];
            $sql = "UPDATE category SET category = '$category', description = '$categoryDesc' WHERE category_id = '$category_id'";
        }

        //Validate Insert Query
        if (mysqli_query($conn, $sql)) {
            //If Succesfull
            header('Location: ../../dashboard/dashboard_category_manage.php');
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