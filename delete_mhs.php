<?php 
include 'koneksi.php';

$nim = $_GET['nim'];

$sql = "DELETE FROM mahasiswa WHERE nim = '$nim'";
mysqli_query($con,$sql);

header("Location:index_mhs.php");

?>