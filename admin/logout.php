<?php 
    session_start();
    if(isset($_SESSION['adm_login'])){
        unset($_SESSION['adm_login']);
            header("location:login.php");
    }
    
?>