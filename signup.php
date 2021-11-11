<?php session_start() ?>

<html lang="en">
<?php include('./templates/head.html') ?>
<body>
  <div class="container">
    <?php 
      include('./templates/header.html');
      echo '<h1>Signup</h1>';
    ?>
    <main>
      <form id="form">
      <div class="mb-3">
        <label for="loginInput" class="form-label">Login</label>
        <input type="text" name="login" class="form-control" id="loginInput" placeholder="Login">
        <p class="login_error form_error hidden"></p>
      </div>
      <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
        <p class="password_error form_error hidden"></p>
      </div>
      <div class="mb-3">
        <label for="passwordConfirmInput" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="passwordConfirmInput" placeholder="Confirm Password">
        <p class="confirm_password_error form_error hidden"></p>
      </div>
      <div class="mb-3">
        <label for="emailInput" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="emailInput" placeholder="Email">
        <p class="email_error form_error hidden"></p>
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Name">
        <p class="name_error form_error hidden"></p>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="sentButton">Send</button>
      </div>
      <div class="alert alert-success hidden" role="alert">
        
      </div>
      <div class="alert alert-danger submit_error hidden" role="alert">
        
      </div>
    </form>
    </main>
  </div>
  <script src="./js/form.control.js"></script>
  <script src="./js/signup.js"></script>
</body>
</html>