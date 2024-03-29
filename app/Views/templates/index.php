<?php

use PhpParser\Node\Stmt\Echo_;
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Temmalusa Art Papua</title>
    <link rel="icon" type="jpg/png" href="<?= base_url(); ?>/img/logo/T-Art Papua.png">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?= base_url(); ?>/vendor/js/helpers.js"></script>
    <script src="<?= base_url(); ?>/js/config.js"></script>

</head>

<body>
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container ">
            <?= $this->include('templates/sidebar'); ?>
            <div class="layout-page ">
                <?= $this->include('templates/topbar'); ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <?= $this->renderSection('page-content'); ?>
                        </div>
                    </div>
                    <footer class="sticky-footer no-print ">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span class="Copyright">Copyright &copy; <?= date('Y') ?> Design By
                                    <a href="https://www.instagram.com/fahri_akbarras/" class="text-black me-3">
                                        <p> <i class="fa-brands fa-square-instagram"></i> @fahri_akbarras
                                        </p>
                                    </a>
                            </div>
                        </div>
                    </footer>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/js/Hide.js"></script>
    <script src="<?= base_url(); ?>/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url(); ?>/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= base_url(); ?>/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= base_url(); ?>/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url(); ?>/js/main.js"></script>

    <!-- Page JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLogout() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Siap untuk Keluar ? ",
                text: " Pilih 'Ya' di bawah, jika Anda siap untuk mengakhiri sesi Anda saat ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya!",
                cancelButtonText: "Tidak!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan penghapusan jika dikonfirmasi
                    window.location.href = "<?= base_url('logout/'); ?>";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Tidak melakukan apa pun jika dibatalkan
                }
            });
        }
    </script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>