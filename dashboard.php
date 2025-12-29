<?php
    // memanggil file koneksi.php untuk membuat koneksi
    include 'config/koneksi.php';
    session_start();

    if(!isset($_SESSION['admin_name'])){
        header('location:login_form.php');
    }
    
    //================= Total Data =====================
    //get data
    //ambil data total
    $get1 = mysqli_query(@$koneksi, "select * from tb_destinasi");
    $count1 = mysqli_num_rows($get1); //menghitung seluruh kolom

    $get2 = mysqli_query(@$koneksi, "select * from user_form");
    $count2 = mysqli_num_rows($get2); //menghitung seluruh kolom
                     
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>WISATA NGANJUK</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style type="text/css">
    * {
        font-family: "Trebuchet MS";
    }
    h1 {
      text-transform: uppercase;
      color: #4b4276;
    }
    button {
      background-color: #4b4276;
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

    table {
      border: 1px solid #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 4%;
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
    .judul {
    position: relative;
    color: white;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 60px;
    text-align: start;
    white-space: nowrap;
    }
  </style>
</head>
<body>
<div class="container1">
        <div class="navigation">
            <ul>
                <li>
                    <a><span class="judul">WISATA NGANJUK</span></a>
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

            <!-- ================ Dashboard ================= -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <h3>Dashboard</h3>
                <div class="row mt-4">
                    <div class="col">
                        <div><h3>Total Data Destinasi : <?=$count1;?></h3></div>
                    </div>
                    <div><h3>Total Data Pengunjung : <?=$count2;?></h3></div>
                </div>
                <div class="box">
                    <h4>Selamat Datang <?php echo $_SESSION['admin_name'] ?> di Website Destinasi</h4>
                </div>
                <table border="1" cellspacing="0" class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    # 1
                    $data = mysqli_query($koneksi, "SELECT * FROM admin_form");
                    # 2
                    while($d = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            3
                            <td><?php echo $d['name']; ?></td>
                            4
                            <td><?php echo $d['email']; ?></td>
                            5
                            <td><p>Admintrator</p></td>
                        </tr>
                        <?php
                    }
                    ?>
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