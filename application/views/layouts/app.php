<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title><?= isset($title) ? $title : 'Ghelm' ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-fixed/">
    <link rel="shortcut icon" href="<?= base_url('/') ?>assets/images/ghelm1.png">


    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('/') ?>assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/libs/fontawesome/css/all.min.css">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/app.css">
    <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/style.css">
    <script src="<?= base_url('/') ?>assets/libs/jquery/jquery-3.6.0.min.js"></script>
    <style>
        @media print {
            .no-print {
                display: none !important
            }
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <?php $this->load->view('layouts/_navbar') ?>
    <!-- end navbar -->

    <!-- content -->
    <?php $this->load->view($page) ?>
    <!-- end content -->

    <!-- footer -->
    <?php $this->load->view('layouts/_footer') ?>
    <!-- end footer -->

    <script>
        $(document).ready(function() {
            $("#flip").click(function() {
                $("#panel").slideToggle("fast");
            });

        });
    </script>
    <script src="<?= base_url('/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/app.js"></script>
</body>

</html>