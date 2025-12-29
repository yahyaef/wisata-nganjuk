<?php 
	error_reporting(0);
	include 'config/koneksi.php';
	$kontak = mysqli_query($koneksi, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($koneksi, "SELECT * FROM tb_destinasi WHERE id_destinasi = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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
</head>

<body>

<div class="container">
        <div class="navigation">
            <ul>
            <li>
                <a href="html/home.html">
                    <span class="title">WISATA NGANJUK</span>
                </a>
                </li>
                <li>
                    <a href="login_form.php">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Log in</span>
                    </a>
                </li>
                <li>
                    <a href="home.html">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="about.html">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">About</span>
                    </a>
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
                    <a href="contact.html">
                        <span class="icon">
                            <ion-icon name="id-card-outline"></ion-icon>
                        </span>
                        <span class="title">Contect</span>
                    </a>
                </li>
            </ul>
        </div>        
    </div>

            <!-- ================ Order Details List ================= -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <h3>Detail Destinasi</h3>
                <div class="box">
				    <div class="col-2">
					    <img src="gambar/<?php echo $p->gambar ?>" width="100%">
				    </div>
				    <div class="col-2">
					    <h3><?php echo $p->nama_destinasi ?></h3>
					    <p>Deskripsi :<br>
						<?php echo $p->deskripsi ?>
					    </p>
					    <hr><p>Tempat Destinasi :<hr></br>
                        <?php echo $p->tp_destinasi ?>
					    </p><hr>
				    </div>
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