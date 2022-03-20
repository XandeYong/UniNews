<?php

    require_once './dashboard_initialization.php';

    if (isset($_POST["submit"])) {
        $control = $_POST["submit"];
        //Verification Process
        if ($control == "add") {
            if(isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["subcategory"]) && isset($_POST["detail"]) && isset($_FILES["feature_image"])) {
                $title = $_POST["title"];
                $category_id = $_POST["category"];
                $subcategory_id = $_POST["subcategory"];
                $description = $_POST["detail"];
                $image = $_FILES["feature_image"];
    
                $imageResult = verifyImage($_FILES["feature_image"]); 
                if ($imageResult['status'] !== 1) {
                    header('Location: ../../dashboard/dashboard_posts_add.php?error=true&img=' . $imageResult['msg']);
                }
                
                //Processing
                executeQuery(dbConnection(), $control, $title, $category_id, $subcategory_id, $description, $image);
            }

        } else if(($control == "edit" || $control == "edit_trash")) {
            if (isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["subcategory"])) {
                $title = $_POST["title"];
                $category_id = $_POST["category"];
                $subcategory_id = $_POST["subcategory"];

                executeQuery(dbConnection(), $control, $title, $category_id, $subcategory_id, null, null);
            }
        } else {
            header('Location: ../../dashboard/dashboard_posts_add.php?error=true');
        }

    } else {
        header('Location: ../../dashboard/dashboard_posts_add.php?error=true');
    }

    //Query Execution Module
    function executeQuery($conn, $control, $title, $category_id, $subcategory_id, $description, $image) {

        if ($control == "add") {
            //Variables 
            $id = 1;
            $dateTime = date('Y-m-d H:i:s');

            //Query Table Size Check
            $sql = "SELECT * FROM news";
            //Running Query
            $result = $conn->query($sql);
            //Return Row Number Based on Result
            if($result->num_rows > 0){
                $id = $result->num_rows;
                $id++;
            }
            $newsID = "N" . (string)$id;

            $uploadStatus = uploadImage($image, $newsID);
            if ($uploadStatus['status'] !== 1) {
                header('Location: ../../dashboard/dashboard_posts_add.php?error=true&img=' + $uploadStatus['msg']);
            }
            $imageName = $uploadStatus['filename'];

            //Query Insert Into Category
            $sql = "INSERT INTO news (news_id, title, description, image, status, datetime, category_id, subcategory_id) 
                    VALUES ('$newsID', '$title', '$description', '$imageName', 'show', '$dateTime', '$category_id', '$subcategory_id')";

        } else if (($control == "edit" || $control == "edit_trash") && isset($_POST["id"])) {
            $newsID = $_POST["id"];
            $sql = "UPDATE news SET title = '$title', category_id = '$category_id', subcategory_id = '$subcategory_id' WHERE news_id = '$newsID'";
        }
        $result = mysqli_query($conn, $sql);

        //Validate Insert Query
        if ($result) {
            //If Succesfull
            if ($control == 'edit_trash') {
                header('Location: ../../dashboard/dashboard_posts_trash.php');    
            } else {
                header('Location: ../../dashboard/dashboard_posts_manage.php');
            }
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

    function verifyImage($image) {
        $target_dir = "../../image/posts/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $message = "Something went wrong.";
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType == "webp" || $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            if ($image["size"] <= 3000000) {
                
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($image["tmp_name"]);
                    if ($check !== false) {
                        $message = "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;

                    } else {
                        $message = "File is not an image.";
                        $uploadOk = 0;
                    }
                }
            } else {
                $message = "Sorry, your file is too large. <br/>
                            Maximum file size: 3MB";
                $uploadOk = 0;
            }
        } else {
            $message = "Sorry, only WEBP, JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        $result = array(
            "status" => $uploadOk,
            "msg" => $message
        );
        return ($result);
    }

    function uploadImage($image, $newsID) {
        $name = explode('.', $image['name']);
        $name[0] = $newsID;
        echo $image['name'];
        $image['name'] = $name[0] . '.' . $name[1];
        echo $image['name'];

        $target_dir = "../../image/posts/";
        $target_file = $target_dir . basename($image["name"]);

        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            $message = "The file ". htmlspecialchars( basename( $image["name"])). " has been uploaded.";
            $uploadOk = 1;
            
        } else {
            $message = "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
        }

        $result = array(
            "filename" => $image['name'],
            "status" => $uploadOk,
            "msg" => $message
        );
        return ($result);
    }

    
?>