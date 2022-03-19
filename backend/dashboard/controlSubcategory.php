<?php

    require_once './dashboard_initialization.php';

    if (isset($_POST["submit"])) {
        $control = $_POST["submit"];
        //Verification Process
        if(isset($_POST["category"]) && isset($_POST["subcategory"]) && isset($_POST["category-desc"])) {
            $category_id = $_POST["category"];
            $subcategory = $_POST["subcategory"];
            $subcategoryDesc = $_POST["category-desc"];   
            
            //Processing
            executeQuery(dbConnection(), $control, $category_id, $subcategory, $subcategoryDesc);
        } else {
            header('Location: ../../dashboard/dashboard_subcategory_add.php?error=true');
        }
    }

    //Query Execution Module
    function executeQuery($conn, $control, $category_id, $subcategory, $subcategoryDesc) {

        if ($control == "add") {
            //Variables 
            $subcategoryID = 1;
            $dateTime = date('Y-m-d H:i:s');

            //Query Table Size Check
            $sql = "SELECT * FROM subcategory";
            //Running Query
            $result = $conn->query($sql);
            //Return Row Number Based on Result
            if($result->num_rows > 0){
                $subcategoryID = $result->num_rows;
                $subcategoryID++;
            }
            $subcategoryIDString = "S" . (string)$subcategoryID;

            //Query Insert Into Category
            $sql = "INSERT INTO subcategory (subcategory_id, subcategory, description, datetime, status, category_id) VALUES ('$subcategoryIDString', '$subcategory', '$subcategoryDesc', '$dateTime', 'show', '$category_id')";

        } else if ($control == "edit" && isset($_POST["id"])) {
            $subcategory_id = $_POST["id"];
            $sql = "UPDATE subcategory SET category_id = '$category_id', subcategory = '$subcategory', description = '$subcategoryDesc' WHERE subcategory_id = '$subcategory_id'";
        }
        $result = mysqli_query($conn, $sql);

        //Validate Insert Query
        if ($result) {
            //If Succesfull
            header('Location: ../../dashboard/dashboard_subcategory_manage.php');
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