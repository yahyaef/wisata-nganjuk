<?php
include 'config/koneksi.php';
session_start();
if(!isset($_SESSION['admin_name'])){
   header('location:login_admin.php');
}
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
  <style>
    .container {
    position: relative;
    width: 100%;
    }
    /* =============== Navigation ================ */
    .navigation {
      position: fixed;
      width: 300px;
      height: 100%;
      background: var(--blue);
      border-left: 10px solid var(--blue);
      transition: 0.5s;
      overflow: hidden;
    }
    .navigation.active {
      width: 80px;
    }

    .navigation ul {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }

    .navigation ul li {
      position: relative;
      width: 100%;
      list-style: none;
      border-top-left-radius: 30px;
      border-bottom-left-radius: 30px;
    }

    .navigation ul li:hover,
    .navigation ul li.hovered {
      background-color: var(--white);
    }

    .navigation ul li:nth-child(1) {
      margin-bottom: 40px;
      pointer-events: none;
    }

    .navigation ul li a {
      position: relative;
      display: block;
      width: 100%;
      display: flex;
      text-decoration: none;
      color: var(--white);
    }
    .navigation ul li:hover a,
    .navigation ul li.hovered a {
      color: var(--blue);
    }

    .navigation ul li a .icon {
      position: relative;
      display: block;
      min-width: 60px;
      height: 60px;
      line-height: 75px;
      text-align: center;
    }
    .navigation ul li a .icon ion-icon {
      font-size: 1.75rem;
    }

    .navigation ul li a .title {
      position: relative;
      display: block;
      padding: 0 10px;
      height: 60px;
      line-height: 60px;
      text-align: start;
      white-space: nowrap;
    }

    /* --------- curve outside ---------- */
    .navigation ul li:hover a::before,
    .navigation ul li.hovered a::before {
      content: "";
      position: absolute;
      right: 0;
      top: -50px;
      width: 50px;
      height: 50px;
      background-color: transparent;
      border-radius: 50%;
      box-shadow: 35px 35px 0 10px var(--white);
      pointer-events: none;
    }
    .navigation ul li:hover a::after,
    .navigation ul li.hovered a::after {
      content: "";
      position: absolute;
      right: 0;
      bottom: -50px;
      width: 50px;
      height: 50px;
      background-color: transparent;
      border-radius: 50%;
      box-shadow: 35px -35px 0 10px var(--white);
      pointer-events: none;
    }

    /* ====================== Responsive Design ========================== */
    @media (max-width: 991px) {
      .navigation {
        left: -300px;
      }
      .navigation.active {
        width: 300px;
        left: 0;
      }
      .main {
        width: 100%;
        left: 0;
      }
      .main.active {
        left: 300px;
      }
      .cardBox {
        grid-template-columns: repeat(2, 1fr);
      }
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

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <div class="banner">
                    <h2>WELCOME TO WISATA NGANJUK</h2>
                </div>
            
                <!-- about -->
                <div class="info">
                    <h3>ABOUT</h3>
                    <div>Kabupaten Nganjuk adalah kota kecil yang memiliki tempat wisata yang menakjubkan. <strong>Salah satunya adalah air terjun sedudo, air tejun ini sangat terkenal</strong>. Selain itu, Kabupaten Nganjuk dikenal sebagai kota angin karena anginnya yang cukup kencang saat musim kemarau membuat kabupaten ini di juluki sebagai Nganjuk Kota Angin.</div>
                    <div>Selain itu Kabupaten Nganjuk juga di juluki sebagai Nganjuk Ijo Royo-Royo yang artinya tumbuh subur dan berkembang dangan daunnya hijau segar penuh keteduhan. Dan dapat membawa manfaat bagi insan lainnya. Ijo Royo-Royo adalah sebuah kata kiasan tentang kondisi yang sesungguhnya. Dimana daerah tersebut memiliki kepesonaan tersendiri.</div>
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