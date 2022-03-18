<?php
    //Verification Process
    if(isset($_POST["category"]) && isset($_POST["category-desc"])){
        $category = $_POST["category"];
        $categoryDesc = $_POST["category-desc"];   
        
        //Processing
        executeQuery(dbConnection(), $category, $categoryDesc);
    }

    //Query Execution Module
    function executeQuery($conn, $category, $categoryDesc){

        //Variables 
        $categoryID = 0;
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

        //Query Insert Into Category
        $sql = "INSERT INTO category (category_id, category, description, datetime, last_modify) VALUES ('$categoryID', '$category', '$categoryDesc', '$dateTime', NULL)";

        
        //Validate Insert Query
        if($conn->query($sql) === True){   
            //If Succesfull
           header('Location: ../dashboard/dashboard_category_manage.php');                   
        }else{      
            //Failed / Error      
           header('Location: ../dashboard/dashboard_index.php');
        }
    }  

    //Establishing Connection
    function dbConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uninews";

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