<?php
    require_once './dashboard_initialization.php';

    //Verification Process
    if(isset($_POST["password"]) && isset($_POST["re_password"])) {
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];

        if ($password == $re_password) {
            //Processing
            executeQuery(dbConnection(), $account_id, $password);
        } else {
            echo "false";
        }
    } else {
        header('Location: ../../dashboard/dashboard_change_password.php?error=true');
    }

    //Query Execution Module
    function executeQuery($conn, $account_id, $password) {
        $account = unserialize($_SESSION["account"]);   
        $account_id = $account->get_account_id();
        $sql = "UPDATE account SET password = '$password' WHERE account_id = '$account_id'";

        //Validate Insert Query
        if (mysqli_query($conn, $sql)) {
            //If Succesfull
            header('Location: ../../dashboard/dashboard_index.php?chgpass=true');
        } else {
            //Failed / Error
            header('Location: ../../dashboard/dashboard_change_password.php?error=true');
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