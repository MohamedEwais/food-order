<?php
include_once('../config.php');


if(isset($_GET['fid']) && isset($_GET['img_name']))
{
    // declare into condition after check a value 
    $fod_id = $_GET['fid'];
    $img_name=$_GET['img_name'];
    
   // case there is image 
    if($img_name!="")
    {
        $path='../../images/food/'.$img_name;
        $del=unlink($path);
    }
    $sql="delete from food where id=$fod_id";
    mysqli_query($connection,$sql);

    header('location:'.SITEURL.'admin/fd-food.php');
}



?>