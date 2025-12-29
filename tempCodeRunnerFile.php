<?php
// memanggil file koneksi.php untuk melakukan koneksi database
# 1
include 'config/koneksi.php';
	// membuat variabel untuk menampung data dari form
  # 2
  $nama          = $_POST['nama_destinasi'];
  # 3
  $tempat        = $_POST['tp_destinasi'];
  # 4
  $deskripsi     = $_POST['deskripsi'];
  # 5
  $gambar        = $_FILES['gambar']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
# 6
if($gambar != "") {
  # 7
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  # 8
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  # 9
  $ekstensi = strtolower(end($x));
  # 10
  $file_tmp = $_FILES['gambar']['tmp_name'];
  # 11 
  $angka_acak     = rand(1, 999);
  # 12
  $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
  # 13
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
    # 14
    move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    # 15
    $query = "INSERT INTO tb_destinasi (nama_destinasi, tp_destinasi, deskripsi, gambar) VALUES ('$nama', '$tempat', '$deskripsi', '$nama_gambar_baru')";
    # 16
    $result = mysqli_query($koneksi, $query);
    // periska query apakah ada error
    # 17
    if(!$result){
      # 18
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    #19
    }else{
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      # 20
      echo "<script>alert('Data berhasil ditambah.');window.location='data-destinasi.php';</script>";
    }
  # 21
  }else {     
    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
    # 22
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
# 23
}else{
  # 24
  $query = "INSERT INTO tb_destinasi (nama_destinasi, tp_destinasi, deskripsi, gambar) VALUES ('$nama', '$tempat', '$deskripsi', null)";
  # 25
  $result = mysqli_query($koneksi, $query);
  // periska query apakah ada error
  # 26
  if(!$result){
    # 27
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
    " - ".mysqli_error($koneksi));
  # 28
  } else {
    //tampil alert dan akan redirect ke halaman index.php
     //silahkan ganti index.php sesuai halaman yang akan dituju
    # 29
    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
  }
}
?>