<?php session_start() ?>
<html lang="en">
<?php include('./templates/head.html') ?>
<body>
  <div class="container">
    <?php 
    include('./templates/header.php');
    ?>
    <main>
    <div class="user-container">
      <?php  if(!isset($_SESSION['userName'])) { ?>
        <h1>Hello. Please sign</h1>
      <?  } ?>
      <?php 
        if (isset($_SESSION['userName'])) {
          echo '<h1>Hello ' .  $_SESSION['userName'] . '</h1>';
        }
        ?>    
    </div>
    <div class="redirect_timer"></div>
    </main>
  </div>
</body>
</html>
