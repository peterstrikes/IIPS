<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/globalSettings.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/jpg" href="<?= SITE_URL ?>assets/images/favicon.jpg">
    <title>TEST SITE</title>

    <!-- Bootstrap CSS and Icon CDN links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS link-->
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/assets/css/navbar-top.css">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-danger-subtle fixed-top">
        <div class="container-fluid">
            <a href="<?= SITE_URL ?>index.php" class="navbar-brand">
                <img src="<?= SITE_URL ?>assets/images/logo.jpg" alt="LOGO">
                <b>SITE</b>
            </a>

            <?php
            if (isset($_SESSION['user_id'])) {
            ?>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse scrollable-navbar" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto me-5">
                    <a href="#" class="nav-item nav-link active">
                        <i class="bi bi-house-door"></i>
                        <span>Home</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-gear"></i>
                        <span>Projects</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-people"></i>
                        <span>Team</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Reports</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-briefcase"></i>
                        <span>Careers</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-envelope"></i>
                        <span>Messages</span>
                    </a>
                    <a href="#" class="nav-item nav-link">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>

                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= SITE_URL ?>assets/images/avatar.png" id="avatar" alt="Avatar">
                            <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu">
                            <span class="dropdown-item text-center text-decoration-underline"><?= $_SESSION['user_email']; ?></span>
                            <div class="divider dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="bi bi-person-vcard"></i> Profile</a>
                            <a href="#" class="dropdown-item"><i class="bi bi-calendar3"></i> Calendar</a>
                            <a href="#" class="dropdown-item"><i class="bi bi-sliders"></i> Settings</a>
                            <div class="divider dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="bi bi-power"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            } else {
            ?>
            <a class="btn btn-success" href="<?= SITE_URL ?>login/index.php">Login</a>
            <?php
            }
            ?>
            
        </div>
    </nav>

    <main class="my-4 pt-5">