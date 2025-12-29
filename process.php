<?php
session_start();

// Memeriksa apakah captcha benar
if (isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha']) {
    // Captcha benar, lanjutkan dengan pemrosesan formulir
    echo "Captcha benar. Formulir dapat diproses.";
} else {
    // Captcha salah, berikan pesan kesalahan
    echo "Captcha salah. Silakan coba lagi.";
}

// Hapus kode captcha dari sesi setelah digunakan
unset($_SESSION['captcha']);
?>