<?php
  class Account {
      private $errorArray;

    public function __construct() {
        $this->errorArray = array();
    }
    public function signup($uname, $em, $pass, $passC) {
      $this->ValidateUsername($uname);
      $this->ValidateEmail($em);
      $this->ValidatePassword($pass, $passC);

      if(empty($this->errorArray) == true) {
        return true;
      }
      else {
        return false;
      }
    }
    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function ValidateUsername($uname){
      if(strlen($uname) > 25 || strlen($uname) < 5){
        array_push($this->errorArray, "username must be between 5 and 25 characters");
        return;
    }
      }
    private function ValidateEmail($em){
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, "email is invalid");
        return;
      }

    }
    private function ValidatePassword($pass, $passC){
      if($pass != $passC){
        array_push($this->errorArray, "password do not match");
        return;
      }
      if(preg_match('/[^A-Za-z0-9]/', $pass)){
        array_push($this->errorArray, "passwrod can only contain numbers and letters");
        return;
      }
      if(strlen($pass) > 8 || strlen($pass) > 6){
        array_push($this->errorArray, "password must be between 6 and 8 characters");
        return;
      }

    }
  }

?>
