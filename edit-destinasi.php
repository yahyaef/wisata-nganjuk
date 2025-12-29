<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'config/koneksi.php';
  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tb_destinasi WHERE id_destinasi = '$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='data-destinasi.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='data-destinasi.php';</script>";
  }         
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #2a2185;
      }
      button {
        background-color: #2a2185;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        border: 0px;
        margin-top: 20px;
      }
      label {
        margin-top: 10px;
        float: left;
        text-align: left;
        width: 100%;
      }
      input {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: #2a2185;
      }
      div {
        width: 100%;
        height: auto;
      }
      .base {
        width: 400px;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        background: #ededed;
      }
    </style>
</head>
<body>
<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a><span class="title">WISATA NGANJUK</span></a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                            <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="data-destinasi.php">
                        <span class="icon">
                          <ion-icon name="file-tray-full-outline"></ion-icon>
                        </span>
                        <span class="title">Data Destinasi</span>
                    </a>
                </li>
                <li>
                    <a href="data_pengunjung.php">
                        <span class="icon">
                          <ion-icon name="file-tray-full-outline"></ion-icon>
                        </span>
                        <span class="title">Data Pengunjung</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>        
    </div>

            <!-- ================ Order Details List ================= -->
            <div class="main">
            <div class="details">
                <div class="recentOrders">    
                <center>
                <h1>Edit Destinasi : <?php echo $data['nama_destinasi']; ?></h1><br>
                <center>
                <form method="POST" action="proses-edit.php" enctype="multipart/form-data" >
                <section class="base">
                    <!-- menampung nilai id produk yang akan di edit -->
                    <input name="id_destinasi" value="<?php echo $data['id_destinasi']; ?>"  hidden />
                    <div>
                    <label>Nama Destinasi</label>
                    <input type="text" name="nama_destinasi" value="<?php echo $data['nama_destinasi']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                    <label>Tempat Destinasi</label>
                    <input type="text" name="tp_destinasi" value="<?php echo $data['tp_destinasi']; ?>" autofocus="" required="" />
                    </div>
                    <div>
                    <label>Deskripsi</label>
                    <input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" />
                    </div>
                    <div>
                    <label>Gambar</label>
                    <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                    <input type="file" name="gambar" />
                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                    <div>
                    <button type="submit">Simpan Perubahan</button>
                    </div>
                    </section>
                </form>

                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>