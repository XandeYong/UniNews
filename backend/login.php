<?php 
    require_once('../model/Account.php');

    //Main part [Verification process]
    if(isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Validate
        if(executeQuery(dbConnection(), $username, $password)){
            header('Location: ../dashboard/dashboard_index.php');
        }else{
            $_SESSION["login_error"] = "Invalid login credentials!";
            header('Location: ../admin_login.php');
        }
    }


    //Establishing connection
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
    
    //Query execution module
    function executeQuery($conn, $username, $password){

        //Query
        $sql = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";

        //Running Query
        $result = $conn->query($sql);

        //Creating class based on result
        if($result->num_rows > 0){
            $row = $result -> fetch_assoc();

            // Start the session
            session_start();

            $loginAccount = new Account($row["account_id"], $row["username"], $row["email"], $row["password"]); 
            $_SESSION["account"] = serialize($loginAccount);             
            return true;        
        }else{
            return false;
        }
    }   

?>