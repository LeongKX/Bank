<?php 
$title = "Register";
function get_content() {
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto py-5">
            <h2 class="text-center">Register</h2>
            <form method="POST" action="/controllers/users/process_register.php">
                <div class="mb-3">
                    <label class="text-light" for="">Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Secure Words</label>
                    <input type="secure_word" name="secure_word" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Phone</label>
                    <input type="phone  " name="phone" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="text-light" for="">Confirm Password</label>
                    <input type="password" name="password2" class="form-control"/>
                </div>

                <button class="btn btn-dark ">Register</button>
            </form>
        </div>
    </div>
</div>

<?php
}
require_once '../template/layout.php';
?>