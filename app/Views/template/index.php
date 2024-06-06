<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css'); ?>">
    <link rel="stylesheet" type="text/css" href="../assets/css/generatesertifikat.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?= $this->include('template/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?= $this->include('template/navbar') ?>

                <?= $this->renderSection('content') ?>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; certificate generator 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- jQuery -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom script for file input label -->
    <script>
        $(document).ready(function() {
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });
    </script>

    <!-- Your custom scripts -->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
    <script>
        // Tunggu 3 detik, lalu sembunyikan notifikasi
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 3000); // 3000 milidetik = 3 detik
    </script>

    <!-- Script JavaScript untuk mengatur visibilitas informasi kontak -->
    <script>
        // Ambil elemen sidebar dan informasi kontak
        const sidebar = document.getElementById('accordionSidebar');
        const contactInfo = document.querySelector('.contact-info');

        // Fungsi untuk menyembunyikan informasi kontak saat toggle sidebar diperkecil
        function toggleContactInfo() {
            if (sidebar.classList.contains('toggled')) {
                // Sidebar diperkecil, sembunyikan informasi kontak
                contactInfo.style.display = 'none';
            } else {
                // Sidebar dalam keadaan normal, tampilkan informasi kontak
                contactInfo.style.display = 'block';
            }
        }

        // Panggil fungsi saat toggle sidebar diubah (diklik)
        document.getElementById('sidebarToggle').addEventListener('click', toggleContactInfo);
    </script>


</body>

</html>