<?php require_once "./dashboard_initialization.php" ?>
<?php require_once "../../model/Subcategory.php" ?>

<?php

if (isset($_POST["category_id"])) {
    $category_id = $_POST["category_id"];    

    //Establishing Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "unipress";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Query
    $sql = "SELECT subcategory_id, subcategory FROM subcategory WHERE status='show' AND category_id = '$category_id'";

    //Executing Query
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    $response = json_encode($outp);
    echo ($response);
}

?>
