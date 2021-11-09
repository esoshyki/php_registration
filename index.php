<?php include('server.php') ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP reg</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <header>
      <h1>Registration</h1>
    </header>
    <main>
      <form id="form" method="POST" action="signup.php">
      <div class="mb-3">
        <label for="loginInput" class="form-label">Login</label>
        <input type="text" name="login" class="form-control" id="loginInput" placeholder="Login">
        <?php 
          if ($_SESSION["login_error"]) {
            echo <div> . $_SESSION["login_error"] . </div>
            unset($_SESSION["login_error"])
          }
        ?>
      </div>
      <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
        <?php 
          if ($_SESSION["password_error"]) {
            echo <div> . $_SESSION["password_error"] . </div>
            unset($_SESSION["password_error"])
          }
        ?>
      </div>
      <div class="mb-3">
        <label for="passwordConfirmInput" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="passwordConfirmInput" placeholder="Confirm Password">
        <?php 
          if ($_SESSION["confirm_password_error"]) {
            echo <div> . $_SESSION["confirm_password_error"] . </div>
            unset($_SESSION["confirm_password_error"])
          }
        ?>
      </div>
      <div class="mb-3">
        <label for="emailInput" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email">
        <?php 
          if ($_SESSION["email_error"]) {
            echo <div> . $_SESSION["email_error"] . </div>
            unset($_SESSION["email_error"])
          }
        ?>
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Name">
        <?php 
          if ($_SESSION["name_error"]) {
            echo <div> . $_SESSION["name_error"] . </div>
            unset($_SESSION["name_error"])
          }
        ?>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="sentButton">Send</button>
      </div>
    </form>
    </main>
  </div>
  <script src="./js/signup.js"></script>
</body>
</html>
