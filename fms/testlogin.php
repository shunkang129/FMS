<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('security.php');

$email = $_POST['email'];
$password = $_POST['password'];

echo "You attempted to login with " . $email . " and " . $password . "<br>";

$hashpw = password_hash($password, PASSWORD_DEFAULT);
echo "hashed password: " . $hashpw . "<br>";

$stmt = $mysqli->prepare("SELECT username, email, password FROM register WHERE email = ?");
$stmt->bind_param("s", $email);

$stmt->execute();
$stmt->store_result();

$stmt->bind_result($uname, $uemail, $pw);

if ($stmt->num_rows == 1) {
    echo "found the row with this email <br>";
    $stmt->fetch();
    echo $uname . "<br>";
    echo $uemail . "<br>";
    echo "Database password: " . $pw . "<br>";
    echo "Entered password: " . $hashpw . "<br>";
    if (password_verify($password, $pw)) {
        echo "The login is successful <br>";
        echo "Password are matched <br>";
        $_SESSION['username'] = $uname;
        $_SESSION['email'] = $uemail;
        exit;
    } else {
        $_SESSION = [];
        session_destroy();
    }
} else {
    echo "not found data";
    $_SESSION = [];
    session_destroy();
}
echo "failed login <br>";

echo "SESSION = <br>";
// echo $_SESSION['username'];
// echo $_SESSION['email'];

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
