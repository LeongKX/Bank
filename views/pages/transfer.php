<?php 
$title = "Register";
function get_content() {
    require_once '../../controllers/connection.php';

    $id = $_SESSION['user_info']['id'];
    $query = "SELECT * FROM accounts WHERE id = $id;";
    $cat_result = mysqli_query($cn, $query);
    $accounts = mysqli_fetch_all($cat_result, MYSQLI_ASSOC); 
?>
<div class="container" style="height: 504px;">
    <div class="row">
        <div class="col-md-6 mx-auto py-5">
            <h2 class="text-center">Transfer</h2>
            <form method="POST" action="/controllers/users/process_transfer.php">

                <div class="mb-3">
                    <label class="text-light" for="">Receiver Account Number</label>
                    <input type="text" name="receiver_account_number" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Amount</label>
                    <input type="text" name="amount" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Description   (optional)</label>
                    <input type="" name="description" class="form-control"/>
                </div>
                <button class="btn btn-dark">Transfer</button>
            </form>
        </div>
    </div>
</div>

<?php
}
require_once '../template/layout.php';
?>