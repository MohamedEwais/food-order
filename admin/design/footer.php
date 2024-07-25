    <!-- start  footer -->

    <div class="footer " style="position: relative;width: 100%;bottom: 0%;text-align: center;">
        <nav class="navbar navbar-expand navbar-dark bg-dark  text-center">
            <div class="container-fluid">
              <a class="navbar-brand  text-center m-auto" href="#">	copy write &copy; Mohamed Ewais </a>
            </div>
          </nav>
     </div>
    <!-- end  footer -->
  
    <script>
        document.getElementById('showPassword').addEventListener('change', function() {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
    <!-- Include SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>