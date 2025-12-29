<?php
  include ('config/koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISATA NGANJUK</title>
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
    table {
      border: 1px solid #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: 1px solid #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
    }
    table tbody td {
        border: 1px solid #DDEEEE;
        color: #333;
        padding: 10px;

    }

    .data {
      background-color: #0004ff;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
    }

    .dataedit {
      background-color: #aa8e00;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
    }

    .datahapus {
      background-color: #C70039;
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
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
                <center><h1>Data Destinasi</h1><center><br>
                <center><a class="data" href="tambah-destinasi.php">+ &nbsp; Tambah Destinasi</a><center><br>
                <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Destinasi</th>
                    <th>Tempat</th>
                    <th>Dekripsi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                # 1
                $query = "SELECT * FROM tb_destinasi ORDER BY id_destinasi ASC";
                # 2
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                # 3
                if(!$result){
                    # 4
                    die ("Query Error: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                }
                //buat perulangan untuk element tabel dari data mahasiswa
                # 5
                $no = 1; //variabel untuk membuat nomor urut
                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                // kemudian dicetak dengan perulangan while
                # 6
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                    7
                    <tr>
                        8
                        <td><?php echo $no; ?></td>
                        9
                        <td><?php echo $row['nama_destinasi']; ?></td>
                        10
                        <td><?php echo $row['tp_destinasi']; ?></td>
                        11
                        <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                        12
                        <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                        <td>
                            13
                            <a class="dataedit" href="edit-destinasi.php?id=<?php echo $row['id_destinasi']; ?>">Edit</a> <br><br>
                            14
                            <a class="datahapus" href="proses-hapus.php?id=<?php echo $row['id_destinasi']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        # 15
                        $no++; //untuk nomor urut terus bertambah 1
                }
                ?>
                </tbody>
                </table>
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