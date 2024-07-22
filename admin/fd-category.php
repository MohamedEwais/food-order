<?php
 include('design/header.php'); 
 include('config.php');
 include('auth.php');
    $sql="select * from category";
    $result=mysqli_query($connection,$sql);
 ?>
 
     <!-- start content -->
       <div class="content">
        <div class="container">
            <h1>Catergory</h1>  
            <?php 
                        if(isset($_SESSION['add-category']))
                        {
                            echo $_SESSION['add-category'];
                            unset($_SESSION['add-category']);
                        }
                      
                        ?>      
            <div class="row">
                <div class="col-3">
                  <a class="btn btn-primary" href="category/create.php" role="button">create</a>
                </div>
            </div>  
            <div class="row">
                <table class="table  mt-4">
                    <thead class="table-primary">
                        <tr>
                            <td>title</td>
                            <td>imgage</td>
                            <td>feature</td>
                            <td>Active</td>
                            <td>Action</td>
                        </tr>  
                    </thead>
                    <tbody>
                       
                          <?php 
                                while($rows=mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo '<td>'.$rows['title'].'</td>';
                                    echo '<td>'.$rows['img_name'].'</td>';
                                    echo '<td>'.$rows['feat'].'</td>';
                                    echo '<td>'.$rows['active'].'</td>';

                                    echo "<td><a class='btn btn-danger m-1 delete-btn' href='admin_crud/delete.php?uid=$rows[id]'>delete</a>";
                                    echo "<a class='btn btn-info' href='admin_crud/update.php?uid=$rows[id]'>update</a></td>";
                                  
                                    echo "</tr>";
                                }
                            ?>
                            
                            <!-- <td>Action</td> -->
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>
     </div>
    <!-- end  content -->

<?php include('design/footer.php'); ?>
