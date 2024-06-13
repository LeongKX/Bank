<?php 
$title = "About";
function get_content() {

    require_once '../../controllers/connection.php';
?>

<div class="container" style="height: 504px;">
    <div class="row">
        <div class="border rounded bg-light">
            <p class="fs-3">Email</p>
            <p>mazebank@gmail.com</p>
        </div>
        <div class="border rounded bg-light">
            <p class="fs-3">Customer Service</p>
            <p>01122321212</p>
        </div>
    </div>
</div>        







<?php
}
require_once '../template/layout.php';
?>