<?php

include 'config/koneksi.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($koneksi, $_POST['name']);
   $email = mysqli_real_escape_string($koneksi, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM admin_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($koneksi, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'admin already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO admin_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($koneksi, $insert);
         header('location:login_admin.php');
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
                    <p>Sudah memiliki akun? <a href="login_admin.php">login now</a></p>
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