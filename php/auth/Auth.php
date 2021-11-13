<?php
  require('./security/disableGetRequest.php');
  require ('FormValidator.php');
  require ('Database.php');

  class Auth {
    private $errors = [];

    public function signUp () {
      $validator = new FormValidator();
      $validateErrors = $validator->checkSignUpData($_POST);

      if (count($validateErrors) > 0) {
        http_response_code(400);
        echo json_encode($validateErrors);
        return;
      } else {
        $database = new Database();
        $databaseErrors = $database->createUser($_POST);

        if (count($databaseErrors) > 0) {
          http_response_code(500);
          echo json_encode($databaseErrors);
          return;
        }
        return http_response_code(200);
      }
    }

    public function signIn () {
      $validator = new FormValidator();
      $validateErrors = $validator->checkSignInData($_POST);
      if (count($validateErrors) > 0) {
        http_response_code(400);
        echo json_encode($validateErrors);
        return;
      } else {
        $database = new Database();

        $user = $database->findUser($_POST["login"]);

        if (!$user) {
          http_response_code(404);
          $this->addError("login", "User not found");
          echo json_encode($this->errors);
          return;
        }

        if (!password_verify($_POST["password"], $user->password)) {
          $this->addError("password", "Incorrect password");
          echo json_encode($this->errors);
          return;
        }

        $_SESSION["userName"] = $user->userName;
        $_SESSION["userLogin"] = $user->login;

        return http_response_code(200);
      }

    }

    private function addError ($type, $message) {
      $error = array(
        "type" => $type,
        "message" => $message
      );
      array_push($this->errors, $error);
    }
  }
?>