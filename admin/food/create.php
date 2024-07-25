<?php
ob_start(); // Start output buffering
include('../config.php');
include('../design/header.php');
?>

<!-- start content -->
<div class="content">
    <div class="container">
        <h1>Create Food</h1> 
        <?php 
        if(isset($_SESSION['upload-food'])) {
            echo $_SESSION['upload-food'];
            unset($_SESSION['upload-food']);
        }
        ?>   
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title : </label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description : </label>
                    <input type="text" class="form-control" id="description" name="description" aria-describedby="description">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image : </label>
                    <input type="file" name="image" id="img_name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price : </label>
                    <input type="text" class="form-control" id="price" name="price" aria-describedby="price">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category : </label>
                    <select name="cate_id" id="">
                        <?php
                            $sql3="select * from category where active='yes'";
                            //run on db
                            $res=mysqli_query($connection,$sql3);
                            
                            if(mysqli_num_rows($res)>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id=$row['id'];
                                    $title=$row['title'];
        
                                    echo '<option value="' . $id . '">' . $title . '</option>';
                                }
                            }else{
                                // there are no data in category-
                                echo '<option value="0">' ."No category". '</option>';

                            } 
                        ?>
                   </select>
                </div>
                <div class="mb-3">
                    <label for="feat" class="form-label">Featured : </label>
                    <input type="radio" name="feat" value="yes"> Yes
                    <input type="radio" name="feat" value="no"> No
                </div>
                <div class="mb-3">
                    <label for="active" class="form-label">Status : </label>
                    <input type="radio" name="active" value="yes"> Yes
                    <input type="radio" name="active" value="no"> No
                </div>
                <button type="submit" class="btn btn-primary" name="btn_food">Submit</button>
            </form>
        </div>  
    </div>
</div>
<!-- end content -->

<?php 
if (isset($_POST['btn_food'])) {
    // Get title
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category=$_POST['cate_id'];
    
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
        $img_destintion="../../images/food/".$img_name;

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
            $_SESSION['upload-food']="<div  style='color:red;'>can't upload image food. img extension(img,jpg,jpeg)</div>";
            header('location:'.SITEURL.'admin/food/create.php');
            die();
        }

    } else {
        $img_name = "";
    }

    $sql = "INSERT INTO food (title, feat, active, img_name, description, price, cate_id) VALUES ('$title', '$feat', '$active', '$img_name', '$description', $price, $category)";

    if (mysqli_query($connection, $sql)) {
        $_SESSION['add-food'] = "<div style='color:green;'>Food added successfully.</div>";
        header("Location: ../fd-food.php");
        exit();
    } else {
        $_SESSION['add-food'] = "<div style='color:red;'>Error adding food.</div>";
        header("Location: ../fd-food.php");
        exit();
    }
}
include('../design/footer.php'); 
ob_end_flush(); // End output buffering
?>
