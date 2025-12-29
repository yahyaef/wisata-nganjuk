<?php

include 'config/koneksi.php';

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
        background-color: #aa8e00;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        }

        .hapus {
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

<!-- ================ Data ================= -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <center><h1>Data Pengunjung</h1></center><br>
                <table border="1" cellspacing="0" class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    # 1
                    $no = 1;
                    # 2
                    $data = mysqli_query($koneksi, "SELECT * FROM user_form");
                    # 3
                    while($d = mysqli_fetch_array($data)) {
                    ?>
                        4
                        <tr>
                            5
                            <td><?php echo $no++; ?></td>
                            6
                            <td><?php echo $d['name']; ?></td>
                            7
                            <td><?php echo $d['email']; ?></td>
                            8
                            <td>
                                <a class="hapus" href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

                <!-- custom css file link  -->
                <link rel="stylesheet" href="assets/css/logris.css">

                </head>
                <body>
                
                <div class="form-container">
                    
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