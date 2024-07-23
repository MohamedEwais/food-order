<?php 
    include('../design/header.php');
    include('../config.php');
?>
    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Create Category</h1> 
            <?php 
              if(isset($_SESSION['upload-category']))
              {
                  echo $_SESSION['upload-category'];
                  unset($_SESSION['upload-category']);
              }
            ?>  
            <div class="row">
                <form action="" method="post"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title : </label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">img name : </label>
                        <input type="file" name="image" id="img_name">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">feat : </label>
                        <input type="radio" name="feat" value="yes">Yes
                        <input type="radio" name="feat" value="no">no
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">status : </label>
                        <input type="radio" name="active"  value="yes">Yes
                        <input type="radio" name="active"  value="no">no
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
        //get title
        $title=$_POST['title'];
        
        if(isset($_POST['feat']))
        {
            $feat=$_POST['feat'];
        }else{
            $feat="no";
        }

        if(isset($_POST['active']))
        {
            $active=$_POST['active'];
        }else{
            $active="no";
        }
        
        // check press the btn ulpload img
        if(isset($_FILES['image']['name']))
        {
            //upload image
            //save image name - path - dest
            $img_name=$_FILES['image']['name'];
            $img_path=$_FILES['image']['tmp_name'];
            $img_destintion="../../images/category/".$img_name;

            // save extension
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
            $img_name="";
        }
        include('../config.php');
        include('../auth.php');

        $sql="insert into category (title,feat,active,img_name) values ('$title','$feat','$active','$img_name')";

        if (mysqli_query($connection, $sql)) {
            // echo "<p style='margin-left: 20px;'>"."Added successfully"."</p>";
            $_SESSION['add-category']="<div style='color:green;'>added category .</div>";
            header("Location:../fd-category.php");
        } else {
            $_SESSION['add-category']="<div style='color:red;'>Error category .</div>";
            header("Location:../fd-category.php");
            // echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }

    }
include('../design/footer.php'); 
?>
