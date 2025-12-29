<?php
# 1
include 'config/koneksi.php';
# 2
if(isset($_POST['submit'])){
    # 3
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    # 4
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    # 5
    $pass = md5($_POST['password']);
    # 6
    $cpass = md5($_POST['cpassword']);
    # 7
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
    # 8
    $result = mysqli_query($koneksi, $select);
    # 9
    if(mysqli_num_rows($result) > 0){
        # 10
        $error[] = 'admin already exist!';
    # 11
    }else{
        # 12
        if($pass != $cpass){
            # 13
            $error[] = 'password not matched!';
        # 14
        }else{
            # 15
            $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
            # 16
            mysqli_query($koneksi, $insert);
            # 17
            header('location:login_form.php');
        }
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
                    <a href="login_admin.php">
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
                <!DOCTYPE html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>register form</title>

                <!-- custom css file link  -->
                <link rel="stylesheet" href="assets/css/logris.css">

                </head>
                <body>
                
                <div class="form-container">

                <form action="" method="post">
                    <h3>register now</h3>
                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <input type="text" name="name" required placeholder="masukkan nama">
                    <input type="email" name="email" required placeholder="masukkan email">
                    <input type="password" name="password" required placeholder="masukkan password">
                    <input type="password" name="cpassword" required placeholder="konfirmasi password">
                    <input type="submit" name="submit" value="register now" class="form-btn">
                    <p>Sudah memiliki akun? <a href="login_form.php">login now</a></p>
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