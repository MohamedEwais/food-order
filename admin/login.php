<?php 
    include('config.php');
    session_start();
    $sql="select * from admin";
    $result=mysqli_query($connection,$sql);
    define('SITEURL', 'http://localhost/food_Pro/');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
        <form action="" method="POST">
                <div class="spContainer mx-auto">
                <div class="card px-4 py-5 border-0 shadow">
                    <div class="d-inline text-left mb-3">                
                    <h3 class="font-weight-bold">Login</h3>
                    <p>Access the most popular project management app</p>
                    <?php 
                        if(isset($_SESSION['login']))
                        {
                            // echo $_SESSION['login'];
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        ?>
                   
                    </div>
                    <div class="d-inline text-center mb-0">
                    <div class="form-group mx-auto">
                        <input class="form-control inpSp" type="text" placeholder="username" name="username">
                    </div>
                    </div>
                    <div class="d-inline text-center mb-3 mt-2">
                    <div class="form-group mx-auto">
                        <input class="form-control inpSp" type="password" placeholder="Password" name="password">
                    </div>
                    </div>
                    <div class="d-inline text-left mb-3">
                    <div class="form-group mx-auto">
                        <button class="btn btn-primary" name="btn_login">Confirm</button>
                        <a class="small text-black-50 pl-2 ml-2 border-left" href="">Forgot Password ?</a>
                    </div>
                    </div>
                    <div class="d-inline text-left mb-1">
                    <div class="form-group mx-auto mb-0">
                        <label class="text-black-50 small">or login with</label>
                    </div>
                    </div>
                    <div class="d-inline text-left">
                    <div class="form-group mx-auto">
                        <button type="button" class="btn btn-sm btn-light"> <span class="badge text-white"><i class="fab fa-google text-danger"></i></span>
                Google
                </button>
                            <button type="button" class="btn btn-sm btn-light ml-2"> <span class="badge text-white"><i class="fab fa-facebook-f text-primary"></i></span>
                Facebook
                </button>
                    </div>
                    </div>
                    <div class="d-inline text-left mt-3">
                    <div class="form-group mx-auto mb-0">
                        <a class="text-black font-weight-bold regStr" href="#">Register new account</a>
                    </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>

<?php 
        if(isset($_POST['btn_login']))
        {
            $ad_username=$_POST['username'];
            $ad_password=$_POST['password'];
            $SQL="select * from admin where username='$ad_username'and password='$ad_password'";
            $res=mysqli_query($connection,$SQL);

            $count=mysqli_num_rows($res);
            if($count==1)
            {   
                // you can access db

                $_SESSION['login']="<div style='color:green;'>login successfuly .</div>";
                header('location:'.SITEURL.'admin/');
            }else{
                // can't access db
                $_SESSION['login']="<div  style='color:red;'>login faild,username or password .</div>";
                
                header('location:'.SITEURL.'admin/login.php');
                // echo "not inside db";

            }

        }
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>