<?php

include('security.php');


if (isset($_POST['loginbtn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' ";
    $query_run = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_array($query_run);

    $username = $data['name'];
    $hash = $data['password'];

    if ($data['usertype'] == 'Admin') {
        if ($data) {
            // function to verify the hashed password and user-entered password
            if (password_verify($password_login, $hash)) {
                $_SESSION['username'] = $email_login;
                $_SESSION['display'] = $username;
                $_SESSION['role'] = $data['usertype'];
                header('Location: index.php');
            } else {
                $_SESSION['status'] = "Email/Password is Invalid";
                header('Location: login.php');
            }
        } else {
            $_SESSION['status'] = "Not found";
            header('Location: login.php');
        }
    } else if ($data['usertype'] == 'User') {
        // function to verify the hashed password and user-entered password
        if (password_verify($password_login, $hash)) {
            $_SESSION['username'] = $email_login;
            $_SESSION['display'] = $username;
            $_SESSION['role'] = $data['usertype'];
            header('Location: index.php');
        } else {
            $_SESSION['status'] = "Email/Password is Invalid";
            header('Location: login.php');
        }
    } else {
        $_SESSION['status'] = "Email OR password is INVALID";
        header('Location: login.php');
    }
}
