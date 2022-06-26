<?php 
 include 'koneksi.php';

 session_start();


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!-- Membuat Form --->
       <!-- card -->
       <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3 border-primary">
          <p class="text-black fs-5 mb-0 justify-content-center">Login</p>
        </div>
        <?php 
         if(isset($_POST['masuk'])){
          $username = $_POST['username'];
          $pass = $_POST['pass'];
          $sql = "SELECT * FROM users WHERE username='$username' AND pass = md5('$pass')";
          $query = mysqli_query($con,$sql);
          $cek = mysqli_num_rows($query);
            
           if($cek==1){
                $_SESSION['userweb'] = $username;
                header("Location:index_mhs.php");
                exit();
           }else{
            echo "<div class='alert alert-danger'>Password atau username salah</div>";
           }
         }
        ?>

          <div class="card-body border-top ">
            <!-- from -->
            <form action="" method="POST" class="mx-auto p-3">
                <!-- row grip -->
                <div class="row">
                    <!-- col1 -->
                      <div class="col">
                        <div class="mb-2">
                          <label for="username" class="form-label">Masukan Username</label>
                          <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
                        </div>
        
                      <div class="mb-2">
                          <label for="pass" class="form-label">Masukan Password</label>
                          <input type="password" class="form-control" name="pass" id="pass" placeholder="Masukan Password" required>
                        </div>

                      <div class="border-top border-2 mt-3 ">
                       <div class="container d-flex mt-2">
                          <a href="register.php"> Buat Akun?</a>
                          <input type="submit" class="btn btn-primary mx-auto me-2" name="masuk" value="Login">
                      </div>
                     </div> 
        </div>

       
     <!-- end card -->
    <!----- Akhir Form--->

  

    
  
  
  
  
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>