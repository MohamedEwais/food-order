<?php
include_once('../config.php');


if(isset($_GET['cid']) && isset($_GET['img_name']))
{
    // declare into condition after check a value 
    $cat_id = $_GET['cid'];
    $img_name=$_GET['img_name'];
    
   // case there is image 
    if($img_name!="")
    {
        $path='../../images/category/'.$img_name;
        $del=unlink($path);
    }
    $sql="delete from category where id=$cat_id";
    mysqli_query($connection,$sql);

    header('location:'.SITEURL.'admin/fd-category.php');
}



?>