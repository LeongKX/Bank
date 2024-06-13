<?php 
require_once '../connection.php';
session_start();

$id = $_SESSION['user_info']['id'];
$query = "SELECT * FROM accounts WHERE id = $id;";
$cat_result = mysqli_query($cn, $query);
$accounts = mysqli_fetch_all($cat_result, MYSQLI_ASSOC); 

$sender_account_number = $_SESSION['user_info']['account_number'];
$receiver_account_number = $_POST['receiver_account_number'];
$sender_balance = $_SESSION['user_info']['balance'];

$amount = floatval($_POST['amount']);
$description = $_POST['description'];

$receiver_query = "SELECT * FROM accounts WHERE account_number = '$receiver_account_number';";
$receiver_result = mysqli_query($cn, $receiver_query);
$receiver = mysqli_fetch_assoc($receiver_result);





$errors = 0;


if(!$receiver) {
    $errors++;
    echo"Invalid account number";
    echo"<a href='/views/pages/transfer.php'>Return</a>";
    $query = "INSERT INTO failed_transactions (transaction_id ,error_type) VALUES 
    ('$sender_account_number', 'Invalid account number');";
    mysqli_query($cn, $query);
}

if($amount > $sender_balance) {
    $errors++;
    echo"Insufficent Money";
    echo"<a href='/views/pages/transfer.php'>Return</a>";
    $query = "INSERT INTO failed_transactions (transaction_id ,error_type) VALUES 
    ('$sender_account_number', 'Insufficent Money');";
    mysqli_query($cn, $query);
}

if($errors == 0) {

    
    $query = "INSERT INTO transactions (amount, sender_account_number, receiver_account_number, description) VALUES
    ($amount,'$sender_account_number','$receiver_account_number','$description');"; 

    mysqli_query($cn, $query);
    
    $updated_sender_balance = $sender_balance - $amount;
    $query1 = "UPDATE accounts SET balance = $updated_sender_balance WHERE account_number = $sender_account_number;";

    $updated_receiver_balance = $receiver['balance'] + $amount;
    $query2 = "UPDATE accounts SET balance = $updated_receiver_balance WHERE account_number = $receiver_account_number;";

    $_SESSION['user_info']['balance'] = $updated_sender_balance;
    
    mysqli_query($cn, $query1);
    mysqli_query($cn, $query2);

    mysqli_close($cn);
    header("Location: /");
}




// redirect to what page?