<?php
    include "inc/config.php";
    if(isset($_GET['set'])&&$_GET['set']==1){
        session_start();
        $_SESSION['prt']=1;
    }
?>