<?php
include 'class/function.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user = $users->ambil_users($user_id);
} else {
    echo "<script> window.location.href = '../login.php'</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" data-footer="true">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Website Dosen</title>
    <meta name="description" content="Website Dosen" />
    <!-- Favicon Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/font/CS-Interface/style.css" />
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/OverlayScrollbars.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/datatables.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/glide.core.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/baguetteBox.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/font/CS-Interface/style.css" />
    <script src="assets/js/base/loader.assets/js"></script>

    <script src="assets/js/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <div class="user-container d-flex">
                    <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="profile" alt="profile" src="assets/img/dosen.png" />
                        <div class="name"><?= $user['nama']; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end user-menu wide">

                        <div class="row mb-1 ms-0 me-0">
                            <div class="col-12 p-1 mb-2 pt-2">
                                <div class="text-extra-small text-primary">Account</div>
                            </div>
                            <div class="col-6 pe-1 ps-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="../logout.php">
                                            <i data-cs-icon="logout" class="me-2" data-cs-size="17"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Menu End -->

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                    <li class="list-inline-item">
                        <a href="#" id="colorButton">
                            <i data-cs-icon="light-on" class="light" data-cs-size="18"></i>
                            <i data-cs-icon="light-off" class="dark" data-cs-size="18"></i>
                        </a>
                    </li>
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                        <li>
                            <a href="index.php" data-href="index.php">
                                <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
                                <span class="label">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="mata_kuliah.php" data-href="mata_kuliah.php">
                                <i data-cs-icon="book" class="icon" data-cs-size="18"></i>
                                <span class="label">Mata Kuliah</span>
                            </a>
                        </li>
                        <li>
                            <a href="mahasiswa.php" data-href="mahasiswa.php">
                                <i data-cs-icon="user" class="icon" data-cs-size="18"></i>
                                <span class="label">Mahasiswa</span>
                            </a>
                        </li>
                        <li>
                            <a href="penilaian.php" data-href="penilaian.php">
                                <i data-cs-icon="file-data" class="icon" data-cs-size="18"></i>
                                <span class="label">Penilaian</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Mobile Buttons Start -->
                <div class="mobile-buttons-container">
                    <!-- Scrollspy Mobile Button Start -->
                    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                        <i data-cs-icon="menu-dropdown"></i>
                    </a>
                    <!-- Scrollspy Mobile Button End -->

                    <!-- Scrollspy Mobile Dropdown Start -->
                    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
                    <!-- Scrollspy Mobile Dropdown End -->

                    <!-- Menu Button Start -->
                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-cs-icon="menu"></i>
                    </a>
                    <!-- Menu Button End -->
                </div>
                <!-- Mobile Buttons End -->
            </div>
            <div class="nav-shadow"></div>
        </div>