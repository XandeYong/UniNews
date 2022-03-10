<?php
    require_once('../model/Account.php');

    //Retreiving Session Data
    session_start();
    if(isset($_SESSION["account"])){
        $loginAccount = unserialize($_SESSION["account"]);        
    }else{
        header('Location: ../index.php');
    }
    
?>