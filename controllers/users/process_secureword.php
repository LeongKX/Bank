<?php 
require_once '../connection.php';
session_start();
$password = $_POST['password'];
$secureword = $_POST ['secureword'];
$username = $_SESSION['user_info']['username'];

$query = "SELECT * FROM accounts WHERE username = '$username'";
// $result = mysqli_query($cn, $query)
$account = mysqli_fetch_assoc(mysqli_query($cn, $query));


if($account && password_verify($password, $account['password']) && $secureword == $account['secure_word']) {
    session_start();
    $_SESSION['user_info']['secured'] = true;
    mysqli_close($cn);
    header('Location: /');
} else {
    echo "<h4>Wrong Credentials</h4>";
    echo "<a href='/views/pages/login.php'>Go back to login</a>";
}