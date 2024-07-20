<?php 
    include('../design/header.php');
    include('../config.php');
    $AdminId=$_GET['uid'];  
     $sql="select * from admin where id = $AdminId";
     $result=mysqli_query($connection,$sql);
     $row=mysqli_fetch_assoc($result);
    // print_r($rows);
?>
    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Update Admin</h1>   
            <div class="row">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="Fullname" class="form-label">Full name : </label>
                        <input type="text" class="form-control" id="Fullname" name="fullname" value="<?php echo $row['full_name']; ?>" aria-describedby="fullname">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User name : </label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" aria-describedby="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" class="form-control"name="password" value="<?php echo $row['password']; ?>" id="password">
                        <input type="checkbox" id="showPassword"> Show Password
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="btn_admin_update">Submit</button>
                </form>
            </div>  
           
        </div>
     </div>
     
    <!-- end  content -->

    <?php 
        if(isset($_POST['btn_admin_update']))
        {
     
            $fullname = $_POST['fullname'];
            $ad_name = $_POST['username'];
            $ad_password = $_POST['password'];
            $sql= "UPDATE admin SET full_name = '$fullname', username = '$ad_name',password ='$ad_password' WHERE admin.id  =$AdminId";
            if (mysqli_query($connection, $sql)) {
              
                header("Location:../fd-admin.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        }
        include('../design/footer.php'); ?>