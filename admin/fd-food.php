<?php
 include('design/header.php'); 
 include('config.php');
 include('auth.php');
    $sql="select * from food";
    $result=mysqli_query($connection,$sql);
 ?>
 
     <!-- start content -->
       <div class="content">
        <div class="container">
            <h1>Food</h1>  
            <?php 
                        if(isset($_SESSION['add-food']))
                        {
                            echo $_SESSION['add-food'];
                            unset($_SESSION['add-food']);
                        }
                        // if(isset($_SESSION['updated-food']))
                        // {
                        //     echo $_SESSION['updated-food'];
                        //     unset($_SESSION['updated-food']);
                        // }
                      
                        ?>      
            <div class="row">
                <div class="col-3">
                  <a class="btn btn-primary" href="food/create.php" role="button">create</a>
                </div>
            </div>  
            <div class="row">
                <table class="table  mt-4">
                    <thead class="table-primary">
                        <tr>
                            <td>sn</td>
                            <td>title</td>
                            <td>description</td>
                            <td>image</td>
                            <td>price</td>
                            <td>feature</td>
                            <td>Active</td>
                            <td>Action</td>
                        </tr>  
                    </thead>
                    <tbody>
                       
                          <?php 
                                $num=1;
                                while($rows=mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo '<td>'.$num++.'</td>';
                                    echo '<td>'.$rows['title'].'</td>';
                                    echo '<td>'.$rows['description'].'</td>';
                                    echo '<td><img src="'.SITEURL.'/images/food/'.$rows['img_name'].'" width="100px"/></td>';
                                    echo '<td>'.$rows['price'].'</td>';
                                    echo '<td>'.$rows['feat'].'</td>';
                                    echo '<td>'.$rows['active'].'</td>';
                                    echo "<td><a class='btn btn-danger m-1 cat-delete-btn' href='food/delete.php?fid=".$rows['id']."&img_name=".$rows['img_name']."'>delete</a>";
                                    echo "<a class='btn btn-info'  href='food/update.php?cid=".$rows['id']."'>update</a></td>";
                                  
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.cat-delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const deleteUrl = this.href;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
</script>
<?php include('design/footer.php'); ?>
