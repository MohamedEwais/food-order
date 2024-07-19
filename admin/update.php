<?php 
    include('design/header.php');
 
?>
    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Update Admin</h1>   
            <div class="row">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="Fullname" class="form-label">Full name : </label>
                        <input type="text" class="form-control" id="Fullname" name="fullname" aria-describedby="fullname">
                        <div id="fullname" class="form-text">We'll never share your Full name with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User name : </label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
                        <div class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password : </label>
                        <input type="password" class="form-control"name="password" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn_admin">Submit</button>
                </form>
            </div>  
           
        </div>
     </div>
    <!-- end  content -->

