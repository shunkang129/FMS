<?php
session_start();

if (isset($_POST['logoutbtn'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['display']);
    unset($_SESSION['role']);
    unset($_SESSION['login']);
    header('Location: login.php');
}
