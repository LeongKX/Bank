<?php 
$title = "secureword";
function get_content() {

    require_once '../../controllers/connection.php';

    $id = $_SESSION['user_info']['id'];
    $query = "SELECT * FROM accounts WHERE id = $id;";
    $acc_result = mysqli_query($cn, $query);
    $account = mysqli_fetch_assoc($acc_result); 

?>

<div class="container" style="height: 504px;">
    <div class="row">
        <div class="col-md-6 mx-auto py-5">
            <h2 class="text-center">Secure Word</h2>
            <div class="text-center text-danger">
               <h3><?php echo $account['secure_word'] ?></h3>
            </div>
             
            <form method="POST" action="/controllers/users/process_secureword.php">
                <div class="mb-3">
                    <input  type="hidden" name="secureword" value="<?php echo $account['secure_word'] ?>">  
                    <label class="text-light" for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <button class="btn btn-dark">Login</button>
            </form>
        </div>
    </div>
</div>


<?php
}
require_once '../template/layout.php';
?>