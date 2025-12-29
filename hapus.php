<?php
# 1
include 'config/koneksi.php';
# 2
$id = $_GET["id"];
  //jalankan query DELETE untuk menghapus data
  # 3
  $query = "DELETE FROM user_form WHERE id='$id' ";
  # 4
  $hasil_query = mysqli_query($koneksi, $query);
  //periksa query, apakah ada kesalahan
  # 5
  if(!$hasil_query) {
    # 6
    die ("Gagal menghapus data: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
  # 7
  }else {
    # 8
    echo "<script>alert('Data berhasil dihapus.');window.location='data_pengunjung.php';</script>";
  }
?>