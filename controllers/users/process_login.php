<?php 
require_once '../connection.php';
$username  = $_POST['username'];
$query = "SELECT * FROM accounts WHERE username = '$username'";
// $result = mysqli_query($cn, $query)
$account = mysqli_fetch_assoc(mysqli_query($cn, $query));

if($account) {
    session_start();
    $_SESSION['user_info'] = $account;
    $_SESSION['user_info']['secured'] = false;
    /*
        $_SESSION['user_info'] = [
            id => 1,
            username => 1234567,
            password = 12312321321,
            email => 123@gmail.com
        ]

        accessing the data

        $_SESSION['user_info']['username']
    */
    
    
    $_SESSION['class'] = 'success';
    $_SESSION['message'] = 'Login Successfully';
    mysqli_close($cn);  
    header('Location: /views/pages/secureword.php');
} else {
    echo "<h4>Users not existed</h4>";
    echo "<a href='/views/pages/login.php'>Go back to login</a>";
}