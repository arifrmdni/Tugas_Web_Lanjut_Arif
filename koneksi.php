<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'web2';


$con = mysqli_connect($host,$username,$password,$db);

  if(!$con){
    die('gagal Koneksi').mysqli_connect_error();
  }

?>