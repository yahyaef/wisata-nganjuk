<?php 
	session_start();
	include '../../config/koneksi.php';
	if($_SESSION['user_name'] != true){
		echo '<script>window.location=""../../login_form.php""</script>';
	}
	$query = mysqli_query($koneksi, "SELECT * FROM user_form WHERE id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISATA NGANJUK</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
    /*=========== Profill =============*/
    .input-control {
        width:100%;
        padding:10px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }
    .btn {
        padding:8px 15px;
        background-color: #C70039;
        color: #fff;
        border:none;
        cursor: pointer;
    }
    .layout {
        width: 80%;
        margin:0 auto;
    }
    .layout:after {
        content: '';
        display: block;
        clear: both;
    }
    .section {
        padding:25px 0;
    }
    .box {
        background-color: #fff;
        border:1px solid #ccc;
        padding:15px;
        box-sizing: border-box;
        margin:10px 0 25px 0;
    }
    .box:after {
        content: '';
        display: block;
        clear: both;
    }
    /*===============================*/
    </style>
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
                    <a href="../html/contact.html">
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

    <!-- ================ Order ================= -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <!-- content -->
                <div class="section">
                    <div class="layout">
                        <h3>Profil</h3>
                        <div class="box">
                            <form action="" method="POST">
                                <input type="text" name="name" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->name ?>" required>
                                <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email ?>" required>
                                <input type="submit" name="submit" value="Ubah Profil" class="btn">
                            </form>
                            <?php
                                # 1 
                                if(isset($_POST['submit'])){
                                    # 2
                                    $nama 	= ucwords($_POST['name']);
                                    # 3
                                    $email 	= $_POST['email'];
                                    # 4
                                    $update = mysqli_query($koneksi, "UPDATE user_form SET 
                                                    name = '".$nama."',
                                                    email = '".$email."',
                                                    WHERE id = '".$d->id."' ");
                                    # 5
                                    if($update){
                                        # 6
                                        echo '<script>alert("Ubah data berhasil")</script>';
                                        # 7
                                        echo '<script>window.location="profil.php"</script>';
                                    # 8
                                    }else{
                                        # 9
                                        echo 'gagal '.mysqli_error($koneksi);
                                    }

                                }
                            ?>
                        </div>

                        <h3>Ubah Password</h3>
                        <div class="box">
                            <form action="" method="POST">
                                <input type="password" name="password" placeholder="Password Baru" class="input-control" required>
                                <input type="cpassword" name="cpassword" placeholder="Konfirmasi Password Baru" class="input-control" required>
                                <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                            </form>
                            <?php 
                                if(isset($_POST['ubah_password'])){
                                    $pass1 	= $_POST['password'];
                                    $pass2 	= $_POST['cpassword'];

                                    if($pass2 != $pass1){
                                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                                    }else{

                                        $u_pass = mysqli_query($koneksi, "UPDATE user_form SET 
                                                    password = '".MD5($pass1)."'
                                                    WHERE id = '".$d->id."' ");
                                        if($u_pass){
                                            echo '<script>alert("Ubah data berhasil")</script>';
                                            echo '<script>window.location="profil.php"</script>';
                                        }else{
                                            echo 'gagal '.mysqli_error($koneksi);
                                        }
                                    }

                                }
                            ?>
                        </div>
                    </div>
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