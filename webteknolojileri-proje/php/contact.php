<?php
$formSubmitted = !empty($_GET);
$errors = [];

if ($formSubmitted) {
    // Form verilerini al
    $name = $_GET['name'] ?? '';
    $email = $_GET['email'] ?? '';
    $phone = $_GET['phone'] ?? '';
    $subject = $_GET['subject'] ?? '';
    $message = $_GET['message'] ?? '';
    $gender = $_GET['gender'] ?? '';
    $contactPref = $_GET['contactPref'] ?? '';

    // Verileri doğrula
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "Ad Soyad geçersiz";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "E-posta geçersiz";
    }

    if (empty($phone) || !preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Telefon numarası geçersiz";
    }

    if (empty($subject)) {
        $errors[] = "Konu seçilmedi";
    }

    if (empty($message) || strlen($message) < 10) {
        $errors[] = "Mesaj geçersiz";
    }

    if (empty($gender)) {
        $errors[] = "Cinsiyet seçilmedi";
    }

    if (empty($contactPref)) {
        $errors[] = "İletişim tercihi seçilmedi";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $formSubmitted ? 'Form Sonucu' : 'İletişim'; ?> | Ömer Buğra Aşkın</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">
                <i class="fas fa-code"></i> Ömer Buğra Aşkın
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">
                            <i class="fas fa-user"></i>Hakkımda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cv.html">
                            <i class="fas fa-file-alt"></i>Özgeçmiş
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="city.html">
                            <i class="fas fa-city"></i>Şehrim
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="heritage.html">
                            <i class="fas fa-landmark"></i>Mirasımız
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="interests.html">
                            <i class="fas fa-heart"></i>İlgi Alanlarım
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">
                            <i class="fas fa-envelope"></i>İletişim
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">
                            <i class="fas fa-sign-in-alt"></i>Giriş
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section" style="margin-top: 56px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 mx-auto text-center animate-fadeInUp">
                    <h1 class="display-4 mb-4"><?php echo $formSubmitted ? 'Form Sonucu' : 'İletişim'; ?></h1>
                    <?php if ($formSubmitted): ?>
                        <?php if (empty($errors)): ?>
                            <p class="lead mb-4">Mesajınız başarıyla alındı!</p>
                        <?php else: ?>
                            <p class="lead mb-4 text-danger">Form gönderiminde hata oluştu!</p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="lead mb-4">Benimle iletişime geçin</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($formSubmitted): ?>
    <!-- Form Sonucu -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="profile-card animate-fadeInUp">
                    <?php if (empty($errors)): ?>
                        <!-- Başarılı Mesaj -->
                        <div class="alert alert-success mb-4">
                            <i class="fas fa-check-circle me-2"></i>
                            Form başarıyla gönderildi!
                        </div>

                        <!-- Form Verileri -->
                        <h3 class="mb-4">Gönderilen Bilgiler:</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Ad Soyad:</th>
                                    <td><?php echo htmlspecialchars($name); ?></td>
                                </tr>
                                <tr>
                                    <th>E-posta:</th>
                                    <td><?php echo htmlspecialchars($email); ?></td>
                                </tr>
                                <tr>
                                    <th>Telefon:</th>
                                    <td><?php echo htmlspecialchars($phone); ?></td>
                                </tr>
                                <tr>
                                    <th>Konu:</th>
                                    <td><?php echo htmlspecialchars($subject); ?></td>
                                </tr>
                                <tr>
                                    <th>Cinsiyet:</th>
                                    <td><?php echo htmlspecialchars($gender); ?></td>
                                </tr>
                                <tr>
                                    <th>İletişim Tercihi:</th>
                                    <td><?php echo htmlspecialchars($contactPref); ?></td>
                                </tr>
                                <tr>
                                    <th>Mesaj:</th>
                                    <td><?php echo nl2br(htmlspecialchars($message)); ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php else: ?>
                        <!-- Hata Mesajı -->
                        <div class="alert alert-danger mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            Aşağıdaki hatalar oluştu:
                        </div>
                        <ul class="list-group mb-4">
                            <?php foreach ($errors as $error): ?>
                                <li class="list-group-item text-danger">
                                    <i class="fas fa-times me-2"></i>
                                    <?php echo htmlspecialchars($error); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <!-- Geri Dön Butonu -->
                    <div class="text-center mt-4">
                        <a href="contact.html" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>İletişim Formuna Dön
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">Ömer Buğra Aşkın</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 