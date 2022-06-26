<?php 
 include 'koneksi.php';


 $id_dosen = $_GET['id_dosen'];
//  $sql = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
 $sql = "SELECT * FROM dosen  WHERE id_dosen = '$id_dosen'";
 $query = $con->query($sql);
 $user_data = mysqli_fetch_array($query);

$sqlGet = "SELECT * FROM  dosen ";
$queryGet =$con->query($sqlGet);
$count = mysqli_num_rows($queryGet);
$no=0;
  if(!$count){
    $no=1;
  }else{
    $no = $count;
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!---Navbar---->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
  <div class="container">
    <a class="navbar-brand" href="#">CRUD SEDERHANA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index_mhs.php">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_kelas.php">Data Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Data Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Data Jurusan</a>
        </li>
      </ul>
    </div>
  </div>
  <a href="log_out.php" class="btn btn-secondary me-5">Logout</a>
 </nav>
    <!---Tutup Navbar---->
    <!-- Membuat Form --->
       <!-- card -->
       <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3">
           <p class="text-black fs-5 mb-0 text-center"> Data Dosen</p>
          </div>
          <div class="tabel">
         <div class="row">
            <div class="cols">
            <table class="table">
            <thead>
             <tr>
              <th scope="col">Id_Dosen</th>
              <th scope="col">Nama_Dosen</th>
             </tr>
           </thead>
           <?php
            $sql ="SELECT * FROM dosen";
            $query = mysqli_query($con,$sql);
           
            while($data = mysqli_fetch_array($query)){
          echo " <tbody>
                 <tr>
                  <td>$data[id_dosen]</td>
                  <td>$data[nama_dosen]</td>
                  <td>
                    <div class='row'>
                     <div class='col'>
                     <a href='update_dosen.php?id_dosen=$data[id_dosen]' class='btn btn-warning mx-auto me-2'>Update</a>
                     </div>
                    </div>
                  </td>
                 </tr> 
                </tbody>
            ";
            }
           ?>
            </table>
        </div>
        </div>
        </div>
        </div>
     <!-- end card --> 
    <!----- Akhir Form--->

    <!---Card tambah Data--->
    <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3">
           <p class="text-black fs-5 mb-0 text-center">Update Data Dosen</p>
          </div>
          <form action="update_dosen.php" method="POST" class="mx-auto p-3">
                <!-- row grip -->
                <div class="row">
                    <!-- col1 -->
                      <div class="col">
                        <div class="mb-2">
                          <label for="id_dosen" class="form-label">Id_Dosen</label>
                          <input type="text" class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $user_data['id_dosen']?>" readonly>
                        </div>
                        <div class="mb-2">
                          <label for="nama_dosen" class="form-label">Nama_Dosen</label>
                          <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" value="<?php echo $user_data['nama_dosen']?>" required>
                        </div>
                       </div>
                </div>
                <input type="submit" class="btn btn-primary" name="update" value="Update Dosen">
           </form>
        </div>
   <!----Akhir card tambah Data--->

   <?php
   if(isset($_POST['update'])) {
		$nama_dosen = $_POST['nama_dosen'];

        $id = $_POST['id_dosen'];;
        $sql2 = "UPDATE dosen SET nama_dosen='$nama_dosen' WHERE id_dosen='$id'";
        $query2 = mysqli_query($con,$sql2);

       echo"<script>window.location.href='add_dosen.php';</script>"; 
    } 
	
	?>
  
    
  
  
  
  
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>