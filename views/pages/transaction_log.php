<?php 
$title = "transaction_log";
function get_content() {

require_once '../../controllers/connection.php';

$id = $_SESSION['user_info']['id'];
$my_account_number = $_SESSION['user_info']['account_number'];

// $transfer_query = "SELECT * FROM transactions";
// $transfer_result = mysqli_query($cn, $transfer_query);
// $my_transfers = mysqli_fetch_all($transfer_result, MYSQLI_ASSOC);

$query = "SELECT * FROM transactions WHERE sender_account_number = '$my_account_number' OR receiver_account_number = '$my_account_number' ORDER BY date_time desc;";        
$result = mysqli_query($cn, $query);
$transfers = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<div>
    <?php if(count($transfers) > 0): ?>
    <?php foreach($transfers as $transfer): ?> <!-- orders table -->
        <div class=" p-5 my-3">
            <div class="d-flex justify-content-between bg-dark rounded text-white py-2 px-3 col-12">
                <h6> <?php echo $transfer['id']; ?></h6>
                <h6><?php echo $transfer['sender_account_number'] ?></h6>
                <h6>RM:<?php echo $transfer['amount']?></h6>
                <h6><?php echo $transfer['receiver_account_number']?></h6>
                <h6><?php echo $transfer['description']?></h6>
                <span><?php echo $transfer['date_time']; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <h2 class="text-light" style="height: 504px;"> No Transactions Found.</h2>
    <?php endif; ?>
</div>






<?php
}
require_once '../template/layout.php';
?>