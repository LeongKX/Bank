<?php 
$title = "Login";
function get_content() {
?>

<div class="container" style="height: 504px;">
    <div class="row">
        <div class="col-md-6 mx-auto py-5">
            <h2 class="text-center">Login</h2>
            <form method="POST" action="/controllers/users/process_login.php">
                <div class="mb-3">
                    <label class="text-light" for="">Username</label>
                    <input type="text" name="username" class="form-control"/>
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