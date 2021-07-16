<?php
    session_start();
    if (!isset($_SESSION['email'])) {header("Location: ../../index.php");}
    include("_tempHeaderCom.php");
?>


<div class="container">
    <div class="jumbotron mt-2">
            <?php echo '<h5>olá,</h5> <h2>'. $_SESSION['name'] . '</h2>'; ?>
    </div>
</div>

<?php include("_tempFooterCom.php"); ?>