<?php

    //Verification Process
    if (isset($_POST["newsID"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["comment"]) ) {
        $newsID = $_POST["newsID"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $comment = $_POST["comment"];
        
        //Processing
        executeQuery(dbConnection(), $newsID, $name, $email, $comment);                                    
    } else {
        header('Location: ../index.php?id=' . $newsID . '&error=true');
    }

    //Query Execution Module
    function executeQuery($conn, $newsID, $name, $email, $comment) {
        $id = 1;
        $dateTime = date('Y-m-d H:i:s');

        //Query Table Size Check
        $sql = "SELECT * FROM comment";
        //Running Query
        $result = $conn->query($sql);
        //Return Row Number Based on Result
        if($result->num_rows > 0){
            $id = $result->num_rows;
            $id++;
        }
        $commentID = "CO" . (string)$id;


        $sql = "INSERT INTO comment (comment_id, name, email, content, status, datetime, news_id) VALUES ('$commentID', '$name', '$email', '$comment', 'pending', '$dateTime', $newsID)";

        //Validate Insert Query
        if (mysqli_query($conn, $sql)) {
            //If Succesfull
            header('Location: ../news.php?id=' . $newsID);
        } else {
            //Failed / Error
            header('Location: ../index.php');
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