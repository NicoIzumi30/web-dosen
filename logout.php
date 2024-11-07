<?php
include 'class/function.php';
$logout = $users->logout();
echo "<script> window.location.href = 'login.php'</script>";
exit();
