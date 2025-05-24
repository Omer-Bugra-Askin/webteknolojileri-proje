<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Boş alan kontrolü
    if (empty($email) || empty($password)) {
        header("Location: ../pages/login.html?error=" . urlencode("E-posta ve şifre alanları boş bırakılamaz!"));
        exit();
    }

    // Doğru kullanıcı bilgileri
    $valid_email = "b181210055@sakarya.edu.tr";
    $valid_password = "b181210055";

    // Kullanıcı doğrulama
    if ($email === $valid_email && $password === $valid_password) {
        echo "Hoşgeldiniz b181210055";
        header("refresh:2;url=../index.html");
        exit();
    } else {
        header("Location: ../pages/login.html?error=" . urlencode("Hatalı e-posta veya şifre!"));
        exit();
    }
} else {
    header("Location: ../pages/login.html");
    exit();
}
?>