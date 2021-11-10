<?php session_start() ?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP reg</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="./styles/globals.css" rel="stylesheet" >
</head>
<body>
  <div class="container">
    <header>
      <h1>Signin</h1>
    </header>
    <main>
      <form id="form" >
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
    </form>
    </main>
  </div>
  <script src="./js/form.control.js"></script>
  <script src="./js/signin.js"></script>
</body>
</html>