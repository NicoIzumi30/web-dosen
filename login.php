<?php
include 'class/function.php';
if (isset($_POST['login'])) {
    $login = $users->login(
        $_POST['nik'],
        $_POST['password'],
    );
}
if (isset($_SESSION['user_id'])) {
    echo "<script> window.location.href = 'index.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/login/bootstrap.min.css">
    <link rel="stylesheet" href="assets/login/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/login/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/login/style.css">
    <style>
        .btn-primary {
            background-color: #58d5f7;
            border: 1px solid white
        }

        .btn-primary:hover {
            background-color: #5b93d3;
            border: 1px solid white
        }
    </style>
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox pb-4 px-3">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <?php
                            if (isset($_POST['login'])) {
                                if ($login) {
                            ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $login; ?>
                                    </div>
                            <?php }
                            }
                            ?>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label class="form-control-label">NIK</label>
                                    <input type="text" name="nik" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="form-control pass-input">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100 mt-3" type="submit" name="login">Login</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/login/jquery-3.6.0.min.js"></script>

    <script src="assets/login/bootstrap.bundle.min.js"></script>

    <script src="assets/login/feather.min.js"></script>

    <script src="assets/login/script.js"></script>
</body>

</html>