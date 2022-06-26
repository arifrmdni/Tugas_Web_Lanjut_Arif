<?php 
 include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!-- Membuat Form --->
       <!-- card -->
       <div class="card shadow mx-auto mt-3" style="width:50%">
          <div class="card-header bg-light border-top border-bottom-0 border-3 border-primary">
          <p class="text-black fs-5 mb-0">Tambah Data Mahasiswa</p>
        </div>

        <?php
    
    if (isset($_POST['tambah'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $dosen = $_POST['dosen'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];


    $sql1 = "SELECT * FROM mahasiswa WHERE nim='$nim'";
    $query1 = $con->query($sql1);
    $cek = mysqli_num_rows($query1);

      if($cek>0){
        echo "<div class='alert alert-danger'>nim: $nim sudah ada</div>";
      }else{
        $sqlInsert = "INSERT INTO mahasiswa(nim,nama,kelas,jurusan,dosen,telepon,alamat) 
        VALUES('$nim','$nama','$kelas','$jurusan','$dosen','$telepon','$alamat')";
        $query2 = $con->query($sqlInsert);

        echo "<div class='alert alert-success'>Data berhasil ditambahkan<a href='index_mhs.php'>Lihat disini</a></div>";
      }
     
    

  }


    ?>

          <div class="card-body border-top ">
            <!-- from -->
            <form action="add_mhs.php" method="POST" class="mx-auto p-3">
                <!-- row grip -->
                <div class="row">
                    <!-- col1 -->
                      <div class="col">
                        <div class="mb-2">
                          <label for="nim" class="form-label">NIM</label>
                          <input type="text" class="form-control" name="nim" id="nim" placeholder="xx01" required>
                        </div>
        
                      <div class="mb-2">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>

                        <div class="mb-2">
                          <label for="kelas" class="form-label">KELAS</label>
                          <select class="form-select"name="kelas" id="kelas" required>
                            <option >Pilih Kelas</option>
                            <?php
                                $sql = "SELECT * FROM kelas";
                                $data = mysqli_query($con,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama_kelas']?> </option>
                                <?php endforeach?>
                            </select>
                        </div>

                        <div class="mb-2">
                          <label for="jurusan" class="form-label">Jurusan</label>
                          <select class="form-select"name="jurusan" id="jurusan" required>
                            <option >Pilih Jurusan</option>
                            <?php
                                $sql = "SELECT * FROM jurusan";
                                $data = mysqli_query($con,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama_jurusan']?> </option>
                                <?php endforeach?>
                            </select>
                        </div>

                      <!-- col2 -->
                      <div class="col">

                      <div class="mb-2">
                          <label for="dosen" class="form-label">Dosen</label>
                          <select class="form-select"name="dosen" id="dosen" required>
                            <option >Pilih Dosen</option>
                            <?php
                                $sql = "SELECT * FROM dosen";
                                $data = mysqli_query($con,$sql);
                                $no =(int) 1;
                                foreach($data as $rows ) : ?>
                                <option value="<?php echo $no++ ?>"> <?php echo $rows['nama_dosen']?> </option>
                                <?php endforeach?>
                            </select>
                      </div>

                      <div class="mb-2">
                          <label for="telepon" class="form-label">Telepon</label>
                          <input type="text" class="form-control" name="telepon" id="telepon" placeholder="xx123" required>
                      </div>
                      <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat</label>
                          <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="jln.xxx" required></textarea>
                        </div> 
                </div>
                <!-- end row -->
                <div class="border-top border-2 mt-3 ">
                       <div class="container d-flex mt-2">
                          <a href="index_mhs.php" class="btn btn-secondary mx-auto me-2">Tutup</a>
                          <input type="submit" class="btn btn-primary" name="tambah" value="Tambah Data">
                      </div>
                </div> 
            </form>
            <!-- end form -->
          </div>
          <!-- end body -->
        </div>
     <!-- end card -->
    <!----- Akhir Form--->

  

    
  
  
  
  
  
  
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>