<?php 
    include('../design/header.php');
    include('../config.php');
    $cat_id = $_GET['cid'];
    $sql = "SELECT * FROM category WHERE id = $cat_id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
?>
    <!-- start content -->
    <div class="content">
        <div class="container">
            <h1>Update Category</h1> 
        
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title : </label>
                        <input type="text" class="form-control" id="title" value="<?php echo $row['title']; ?>" name="title" aria-describedby="title">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Name : </label>
                        <input type="file" name="image" id="img_name"><br>
                        <img src="<?php echo '../../images/category/' . $row['img_name']; ?>" width="150px" alt="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Featured : </label>
                        <input type="radio" name="feat" <?php if ($row['feat'] == "yes") { echo "checked"; } ?> value="yes">Yes
                        <input type="radio" name="feat" <?php if ($row['feat'] == "no") { echo "checked"; } ?> value="no">No
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status : </label>
                        <input type="radio" name="active" <?php if ($row['active'] == "yes") { echo "checked"; } ?> value="yes">Yes
                        <input type="radio" name="active" <?php if ($row['active'] == "no") { echo "checked"; } ?> value="no">No
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_category">Submit</button>
                </form>
            </div>  
        </div>
    </div>
    <!-- end content -->

<?php 
    if (isset($_POST['btn_category'])) {
        // Get all the form data
        $title = $_POST['title'];
        $current_img = $row['img_name'];  // Change $_POST to $row
        $feat = $_POST['feat'];
        $active = $_POST['active'];
        
        // Handle the image upload
        $upload = false;
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
            

            // Remove the current image if a new image is uploaded
            if ($current_img != "") {
                $current_img_path = "../../images/category/" . $current_img;
                unlink($current_img_path);
                $img_name = $_FILES['image']['name'];
                $img_path = $_FILES['image']['tmp_name'];
                $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                $img_destintion = "../../images/category/" . $img_name;
                
                // Check the file extension
                if ($img_ext == "png" || $img_ext == "jpg" || $img_ext == "jpeg") {
                    $upload = move_uploaded_file($img_path, $img_destintion);
                }
                
                if (!$upload) {
                    $_SESSION['upload-category'] = "<div style='color:red;'>Can't upload image. Only JPG, JPEG, PNG files are allowed.</div>";
                    header('location:' . SITEURL . 'admin/category/create.php');
                    die();
                }
            }
        } else {
            $img_name = $current_img;
        }

        // Update the database
        $sql = "UPDATE category SET 
                    title = '$title',
                    img_name = '$img_name',
                    feat = '$feat',
                    active = '$active'
                WHERE id = $cat_id";
        
        if (mysqli_query($connection, $sql)) {
            $_SESSION['updated-category'] = "<div style='color:green;'>Category updated successfully.</div>";
            header("Location: ../fd-category.php");
        } else {
            $_SESSION['updated-category'] = "<div style='color:red;'>Error updating category.</div>";
            header("Location: ../fd-category.php");
        }
    }
    include('../design/footer.php'); 
?>
