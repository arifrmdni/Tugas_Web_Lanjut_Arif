<?php
  include 'koneksi.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD SEDERHANA</title>
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
          <a class="nav-link active" aria-current="page" href="#">Data Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_kelas.php">Data Kelas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_dosen.php">Data Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_jurusan.php">Data Jurusan</a>
        </li>
      </ul>
    </div>
  </div>
  <a href="log_out.php" class="btn btn-secondary me-5">Logout</a>
 </nav>
    <!---Tutup Navbar---->
    
    <!--Membuat Tabel  ---->
    <div class="button">
        <div class="row">
        <a href="add_mhs.php" class="btn btn-success" style="width:200px; height:50px; margin-left:20px; margin-top:10px; padding:10px;">Tambah Data Mahasiswa</a>

        </div>
    </div>
      <div class="tabel">
         <div class="row">
            <div class="cols">
            <table class="table">
            <thead>
             <tr>
              <th scope="col">NIM</th>
              <th scope="col">NAMA</th>
              <th scope="col">KELAS</th>
              <th scope="col">JURUSAN</th>
              <th scope="col">DOSEN</th>
              <th scope="col">TELEPON</th>
              <th scope="col">ALAMAT</th>
              <th scope="col">Aksi</th>
             </tr>
           </thead>
           <?php
            $sql = "SELECT mahasiswa.nim , mahasiswa.nama ,kelas.nama_kelas, jurusan.nama_jurusan, dosen.nama_dosen
                  , mahasiswa.telepon, mahasiswa.alamat FROM mahasiswa INNER JOIN kelas ON mahasiswa.kelas = kelas.id_kelas INNER JOIN jurusan ON mahasiswa.jurusan = jurusan.id_jurusan INNER JOIN dosen ON mahasiswa.dosen = dosen.id_dosen "; 
            $query = mysqli_query($con,$sql);
           
            while($data = mysqli_fetch_array($query)){
          echo " <tbody>
                 <tr>
                  <td>$data[nim]</td>
                  <td>$data[nama]</td>
                  <td>$data[nama_kelas]</td>
                  <td>$data[nama_jurusan]</td>
                  <td>$data[nama_dosen]</td>
                  <td>$data[telepon]</td>
                  <td>$data[alamat]</td>
                  <td>
                    <div class='row'>
                     <div class='col'>
                     <a href='update_mhs.php?nim=$data[nim]' class='btn btn-warning mx-auto me-2'>Update</a>
                     <a href='delete_mhs.php?nim=$data[nim]' class='btn btn-danger mx-auto me-2'>Delete</a>
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
    
      


    <!--Akhir Tabel ---->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>