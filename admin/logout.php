<?php 

    include('config.php');
    // delete session
    session_destroy();

    //redir header Login page
    header('location:'.SITEURL.'admin/login.php');
    
 ?>