<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/landing_page.css">

    <title>Selamat Datang</title>

</head>

<body>
    <header class="">
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" style="width: 50px; height: 50px">
        <div class="right-buttons">
            <a href="<?= base_url('/mydashboard'); ?>">Home</a>
            <a href="<?= base_url('/generate'); ?>">Create</a>
            <a href="<?= base_url('/login'); ?>" class="btn-sign-up">Sign In</a>
        </div>
    </header>

    <section>
        <div>
            <h2>Start Managing Your Certificates Easily and Securely Today!</h2>
            <p>Where certificate management meets blockchain technology!
                Take control of your certificates effortlessly and with utmost security.
                Our innovative platform empowers you to streamline certificate creation, distribution, and verification processes like never before.
            </p>
            <div class="button-container">
                <a href="<?= base_url('/generate'); ?>" style="text-decoration: none" class="btn-buat-sertifikat">Create Certificate</a>
            </div>

        </div>
        <img src="assets/img/tangan.png" alt="tangans">
    </section>


</body>

</html>