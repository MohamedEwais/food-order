<?php 
    include('../design/header.php');
    include('../config.php');
    $cat_id=$_GET['cid'];
    $sql="select * from category where id = $cat_id";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
?>
    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Update Category</h1> 
        
            <div class="row">
                <form action="" method="post"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title : </label>
                        <input type="text" class="form-control" id="title"value="<?php echo $row['title']; ?>"  name="title" aria-describedby="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">img name : </label>
                        <input type="file" name="image" id="img_name"><br>
                        <img src="<?php echo'../../images/category/'.$row['img_name']; ?>" width="150px" alt="" srcset="">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">feat : </label>
                        <input type="radio" name="feat" <?php  if($row['feat']=="yes"){echo "checked";}?> value="yes">Yes
                        <input type="radio" name="feat" <?php  if($row['feat']=="no"){echo "checked";}?> value="no" >no
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">status : </label>
                        <input type="radio" name="active" <?php  if($row['active']=="yes"){echo "checked";}?>  value="yes">Yes
                        <input type="radio" name="active" <?php  if($row['active']=="no"){echo "checked";}?>  value="no">no
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_category">Submit</button>
                </form>
            </div>  
           
        </div>
     </div>
    <!-- end  content -->

<?php 

    if(isset($_POST['btn_category']))
    {
        //get all 
     
        $title=$_POST['title'];
        $current_img=$_POST['img_name'];
        $feat=$_POST['feat'];
        $active=$_POST['active'];

        if(isset($_FILES['image']['name']))
        {
            $img_name=$_FILES['image']['name'];
            if($img_name !="")
            {
                $ex=end(explode(".",$img_name)); 
                //convert ex to lower
                $ex_lower=strtolower($ex);
    
                if($ex_lower=="png"||$ex_lower=="jpg"||$ex_lower=="jpeg"){
                    //upload img to serve location
                    $upload=move_uploaded_file($img_path,$img_destintion);
    
                }
                //check if not upload image ,redir and add msg error
                if($upload==false)
                {
                    $_SESSION['upload-category']="<div  style='color:red;'>can't upload image category. img extension(img,jpg,jpeg)</div>";
                    header('location:'.SITEURL.'admin/category/create.php');
                    die();
                }
            }else{
              $img_name=$current_img;
             }

        }else{
            $img_name=$current_img;
        }
        // check press the btn ulpload img
        // if(isset($_FILES['image']['name']))
        // {
        //     //upload image
        //     //save image name - path - dest
        //     $img_name=$_FILES['image']['name'];
        //     $img_path=$_FILES['image']['tmp_name'];
        //     $img_destintion="../../images/category/".$img_name;

        //     // save extension
        //     $ex=end(explode(".",$img_name)); 
        //     //convert ex to lower
        //     $ex_lower=strtolower($ex);

        //     if($ex_lower=="png"||$ex_lower=="jpg"||$ex_lower=="jpeg"){
        //         //upload img to serve location
        //         $upload=move_uploaded_file($img_path,$img_destintion);

        //     }
        //     //check if not upload image ,redir and add msg error
        //     if($upload==false)
        //     {
        //         $_SESSION['upload-category']="<div  style='color:red;'>can't upload image category. img extension(img,jpg,jpeg)</div>";
        //         header('location:'.SITEURL.'admin/category/create.php');
        //         die();
        //     }

        // }else{
        //     $img_name="";
        // }
        include('../config.php');
        include('../auth.php');

        $sql="UPDATE category set 
                 title='$title',
                 feat='$feat',
                 active='$active'
                 where id=$cat_id 
                 ";

        if (mysqli_query($connection, $sql)) {
            // echo "<p style='margin-left: 20px;'>"."Added successfully"."</p>";
            $_SESSION['updated-category']="<div style='color:green;'>updateded category .</div>";
            header("Location:../fd-category.php");
        } else {
            $_SESSION['updated-category']="<div style='color:red;'>Error category .</div>";
            header("Location:../fd-category.php");
            // echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

    }
include('../design/footer.php'); 
?>
