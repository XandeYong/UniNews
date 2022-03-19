<?php
    if (basename(dirname(getcwd(),1)) == 'backend') {
        require_once('../../model/Account.php');    
    } else {
        require_once('../model/Account.php');    
    }
    
    //Retreiving Session Data
    session_start();
    if(isset($_SESSION["account"])){
        $loginAccount = unserialize($_SESSION["account"]);        
    }else{
        header('Location: ../index.php');
    }
    
?>