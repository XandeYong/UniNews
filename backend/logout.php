<?php
    session_start();
    unset($_SESSION["account"]); 
    echo "Hello";   
    header('Location: ../index.php');    
?>