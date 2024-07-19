<?php 
     $host="localhost";
     $username="root";
     $password="";
     $dbname="food_pro";

     $connection=mysqli_connect($host,$username,$password,$dbname);

    if($connection)
    {
       
    }else{
        echo "connection fiald". mysqli_connect_error();

    }  
    
    ?>