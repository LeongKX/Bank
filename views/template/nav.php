<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, so hide the image
    $hideImage = true;
} else {
    // User is not logged in, so show the image
    $hideImage = false;
}
?> 



<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
    <div class="container-fluid">
        <a class="navbar_brand fw-bold text-light" href="#">Bank</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>   
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
            

                <?php if(!isset($_SESSION['user_info'])): ?>
                <a class="nav-link text-light" href="/views/pages/login.php">Login</a>
                <a class="nav-link text-light" href="/views/pages/register.php">Register</a>
                <?php endif; ?>



                <?php if(isset($_SESSION['user_info'])): ?>
                <a class="nav-link text-light" href="/controllers/users/process_logout.php">Logout</a>
                <?php endif; ?> 

            </div>
        </div>
    </div>
</nav>
<style>
    body {
        background-image: url(/image/city-of-london-4481399_1920.jpg);
        background-blend-mode: multiply;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: rgba(0,0,0,0.25);
    }

</style>


<div class="container-fluid bg-danger d-flex justify-content-between">
    <?php if(isset($_SESSION['user_info']) && $_SESSION['user_info']['secured']): ?>
        <h5>Account Number: <?php echo $_SESSION['user_info']['account_number'] ?></h5>
        <h5>Amount: RM <?php echo $_SESSION['user_info']['balance'] ?></h5>
    <?php endif; ?>
</div>


