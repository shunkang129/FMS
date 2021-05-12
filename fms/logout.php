<?php
session_start();

if (isset($_POST['logoutbtn'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
}
