<?php 
    include('design/header.php');
    include('config.php');
    include('auth.php');
    $sql="select * from admin";
    $result=mysqli_query($connection,$sql);
 
?>
<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- start content -->
     <div class="content">
        <div class="container">
            <h1>Admin</h1>   
            <div class="row">
                <div class="col-3">
                  <a class="btn btn-primary" href="admin_crud/create-admin.php" role="button">create</a>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-btn');

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
