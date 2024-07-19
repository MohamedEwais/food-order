<?php 
     include('config.php');
    $AdminId=$_GET['uid'];
     $sql = "delete from admin where id = $AdminId";
     mysqli_query($connection,$sql);

     header("Location:fd-admin.php");
