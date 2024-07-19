<?php 
    include('design/header.php');
    include('config.php');
    $sql="select * from admin";
    $result=mysqli_query($connection,$sql);

 
?>
    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Admin</h1>   
            <div class="row">
                <div class="col-3">
                  <a class="btn btn-primary" href="create-admin.php" role="button">create</a>
                </div>
            </div>  
            <div class="row">
                <table class="table  mt-4">
                    <thead class="table-primary">
                        <tr>
                            <td>full name</td>
                            <td>username</td>
                            <td>password</td>
                            <td>Action</td>
                        </tr>  
                    </thead>
                    <tbody>
                       
                          <?php 
                                while($rows=mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo '<td>'.$rows['full_name'].'</td>';
                                    echo '<td>'.$rows['username'].'</td>';
                                    echo '<td>'.$rows['password'].'</td>';
                                    echo "<td><a class='btn btn-danger m-1' href='delete.php?uid=$rows[id]'>delete</a>";
                                    echo "<a class='btn btn-info' href='update.php?uid=$rows[id]'>update</a></td>";
                                  
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
