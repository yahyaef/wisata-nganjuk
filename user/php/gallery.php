<?php 
	include '../../config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<div class="container">
        <div class="navigation">
            <ul>
            <li>
                <a href="../html/home.html">
                    <span class="title">WISATA NGANJUK</span>
                </a>
                </li>
                <li>
                    <a href="../html/home.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="../html/about.html">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">About</span>
                    </a>
                </li>
                <li>
                    <a href="profil.php">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Profile</span>
                    </a>-
                </li>
                <li>
                    <a href="gallery.php">
                        <span class="icon">
                            <ion-icon name="images-outline"></ion-icon>
                        </span>
                        <span class="title">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="html/contact.html">
                        <span class="icon">
                            <ion-icon name="id-card-outline"></ion-icon>
                        </span>
                        <span class="title">Contect</span>
                    </a>
                </li>
                <li>
                    <a href="../../logout.php">
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
                <div class="info">
                    <?php 
                    # 1
                    $destinasi = mysqli_query($koneksi, "SELECT * FROM tb_destinasi");
                    # 2
                    if(mysqli_num_rows($destinasi) > 0){
                        # 3
                        while($p = mysqli_fetch_array($destinasi)){
                            ?>
                            4
                            <a href="detail-destinasi.php?id=<?php echo $p['id_destinasi'] ?>">
                            <div class="col-4">
                                5
                                <img src="../../gambar/<?php echo $p['gambar'] ?>">
                                6
                                <p class="nama"><?php echo $p['nama_destinasi'] ?></p>
                            </div>
                    <?php 
                        }
                    # 7
                    }else{ 
                    ?>
                        8
                        <p>Destinasi tidak ada</p>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../../assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>