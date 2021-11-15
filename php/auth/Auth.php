<?php
  require('./security/disableGetRequest.php');
  require ('FormValidator.php');
  require ('Database.php');

  class Auth {
    private $errors = [];

    public function signUp () 
    {
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

    public function signIn () 
    {
      $validator = new FormValidator();
      $validateErrors = $validator->checkSignInData($_POST);
      if (count($validateErrors) > 0) {
        http_response_code(400);
        echo json_encode($validateErrors);
        return;
      } else {
        $database = new Database();

        $foundUser = $database->findUser($_POST['login']);

        if (!isset($foundUser)) {
          http_response_code(404);
          $this->addError("login", "User not found");
          echo json_encode($this->errors);
          return;
        }

        if (!password_verify($_POST["password"], $foundUser->password)) {
          $this->addError("password", "Incorrect password");
          echo json_encode($this->errors);
          return;
        }

        $_SESSION['userName'] = $foundUser->userName;
        $_SESSION['userLogin'] = $foundUser->login;

        return http_response_code(200);
      }
    }

    private function addError ($type, $message) 
    {
      $error = array(
        "type" => $type,
        "message" => $message
      );
      array_push($this->errors, $error);
    }
  }
?>