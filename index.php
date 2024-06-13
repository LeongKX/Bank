
<?php 
    $title = "Homepage";
    function get_content() {
        require_once './controllers/connection.php';

    
?>
<div class="container" style="height: 504px;">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo $_SESSION['class']; ?>">
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['user_info'])): ?>
    <div class="d-grid gap-3 col-6 mx-auto text-light py-5">
        <a class="btn btn-dark fw-bolder fs-3" href="./views/pages/transfer.php">Transfer</a>
        <a class="btn btn-dark fw-bolder fs-3" href="./views/pages/transaction_log.php">Transaction Log</a>
        <a class="btn btn-dark fw-bolder fs-3" href="./views/pages/about.php">About</a>
    </div>
<?php endif; ?>   
</div>   
   









<?php 
    }
    require_once './views/template/layout.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let alertBox = document.querySelector('.alert');
        setTimeout(function() {
            <?php unset($_SESSION['message']); ?>
            <?php unset($_SESSION['class']); ?>
            alertBox.classList.toggle("d-none");
        }, 2000)    
    })
</script>