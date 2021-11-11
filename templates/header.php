<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light header__nav">
    <div class="header__link">
      <a class="navbar-brand" href="/home.php">Home</a>
    </div>
    <?php  if(!isset($_SESSION['userName'])) { ?>
      <div class="header__link">
        <a class="navbar-brand" href="/signin.php">Signin</a>
      </div>
    <?php  } ?>
    <?  if(!isset($_SESSION['userName'])) { ?>
      <div class="header__link">
        <a class="navbar-brand" href="/signup.php">Signup</a>
      </div>
    <?  } ?>
    <?  if(isset($_SESSION['userName'])) { ?>
      <div class="header__link">
        <span class="navbar-brand logout_button" >Logout</a>
      </div>
    <?  } ?>
    <script src="./js/logout.js"></script>
  </nav>
</header>
