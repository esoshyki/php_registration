<?php
  class FormValidator {

    private $form_data;
    private $errors = [];
    private static $fields = ["login", "password", "confirm_password", "email", "name"];

    public function __construct($post_data) {
      if (isset($post_data)) {
        $this->form_data = $post_data;
      } else {
        $this->form_data = [];
      }
    }

    public function validateForm() {
      foreach (self::$fields as $field) {
        if (!array_key_exists($field, $this->form_data)) {
          $this->addError($field, "$field is required field");
        } else {
          if (empty($this->form_data[$field])) {
            $this->addError($field, "$field is required field");
          }
        }
      }

      $this->validateLogin();
      $this->validatePasswords();
      $this->validateEmail();
      $this->validateName();

      return $this->errors;
    }

    private function validateLogin() {

      $value = trim($this->form_data['login']);
      if (!preg_match('/^[a-zA-Z0-9]{6,12}/', $value)) {
        $this->addError('login', 'Login must be 6-12 characters and must not content special symbols');
      }
    }

    private function validatePasswords() {

      if (array_key_exists('password', $this->errors) && 
          array_key_exists('confirm_password', $this->errors)
        ) {
        return;
      }

      $password = $this->form_data['password'];
      $confirm_password = $this->form_data['confirm_password'];

      if (!($password == $confirm_password)) {
        $this->addError('password', 'passwords doesn\'t match');
        $this->addError('confirm_password', 'passwords doesn\'t match');
      }

    }

    private function validateEmail() {

    }

    private function validateName() {

    }

    private function addError($key, $message) {
      if (array_key_exists($key, $this->errors)) {
        $this->errors[$key] = $this->errors[$key] . "; " . $message;
       } else {
        $this->errors[$key] = $message; 
       }
    }
  }
?>