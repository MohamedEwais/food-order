<?php
    
    if (!isset($_SESSION['username'])) {
        $_SESSION['no-login-msg']="<div  style='color:red;'>please login before  .</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>