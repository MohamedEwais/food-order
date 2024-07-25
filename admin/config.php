<?php 
     $host="localhost";
     $username="root";
     $password="";
     $dbname="food_pro";
     $connection=mysqli_connect($host,$username,$password,$dbname);
    

    // define('SITEURL', 'http://localhost/food_Pro/');

    if($connection)
    {
        // session_start();
        
    }else{
        echo "connection fiald". mysqli_connect_error();

    } 
    // Start the session only if it hasn't been started yet
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    } 
    // Define the SITEURL constant only if it hasn't been defined yet
    if (!defined('SITEURL')) {
        define('SITEURL', 'http://localhost/food_Pro/');
    }
    
    ?>