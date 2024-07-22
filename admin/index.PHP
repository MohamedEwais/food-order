<?php include('design/header.php');
    include('config.php');
    include('auth.php');

    
?>

    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Admin panel</h1> 
            <?php 
                        if(isset($_SESSION['login']))
                        {
                            // echo $_SESSION['login'];
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }
                        ?>   
            <div class="row mt-4">
                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="cont  p-4 bg-dark text-center text-white m-2">
                      <h2>10</h2>
                      Admin
                    </div>
                   
                 </div> 
                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="cont  p-4 bg-dark text-center text-white m-2">
                      <h2>10</h2>
                      Category
                    </div>
                 </div> 
                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="cont  p-4 bg-dark text-center text-white m-2">
                      <h2>10</h2>
                      Food
                    </div>
                 </div> 
                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="cont  p-4 bg-dark text-center text-white m-2">
                      <h2>5</h2>
                      category
                    </div>
                 </div>        
            </div>
        </div>
     </div>
    <!-- end  content -->

<?php include('design/footer.php'); ?>
