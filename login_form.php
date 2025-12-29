<?php
# 1
include 'config/koneksi.php';
# 2
if(isset($_POST['submit'])){
    # 3
    session_start();
    # 4
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    # 5
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
    # 6
    $cek = mysqli_query($koneksi, " SELECT * FROM user_form WHERE email = '".$email."' && password = '".MD5($pass)."' ");
    # 7
    if(mysqli_num_rows($cek) > 0){
        # 8
        $d = mysqli_fetch_object($cek);
        # 9
        $_SESSION['user_name'] = true;
        # 10
        $_SESSION['a_global'] = $d;
        # 11
        $_SESSION['id'] = $d->id;
        # 12
        echo '<script>window.location="user_page.php"</script>';
    # 13
    }else{
        # 14
        echo '<script>alert("Email atau sandi salah!")</script>';
    }
};
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
                <a href="home.html">
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
    <!-- ================ Login ================= -->
    <div class="main">
        <div class="details">
            <div class="recentOrders">
                <!DOCTYPE html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>login form</title>
                <!-- custom css file link  -->
                <link rel="stylesheet" href="assets/css/logris.css">
                </head>
                <body>
                <div class="form-container">

                <form action="" method="post">
                    <h3>login now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="email" name="email" required placeholder="masukkan email">
                    <input type="password" name="password" required placeholder="masukkan password">
                    <img src="captcha.php" alt="gambar"/>
                    <input type="captcha" name="captcha"required placeholder="enter your captcha">
                    <input type="submit" name="submit" value="login now" class="form-btn">
                    <p>tidak punya akun? <a href="register_form.php">register now</a></p>
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