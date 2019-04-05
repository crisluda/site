<?php

include('includes/classes/Constants.php');


  class Account {

      private $con;
      private $errorArray;

    public function __construct($con) {
        $this->con = $con;
        $this->errorArray = array();
    }
    public function signup($uname, $em, $pass, $passC) {
      $this->ValidateUsername($uname);
      $this->ValidateEmail($em);
      $this->ValidatePassword($pass, $passC);

      if(empty($this->errorArray) == true) {
        return $this->insertUserDetails($uname, $em, $pass);
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
    public function insertUserDetails($uname, $em, $pass){
      $encryptedPw = md5($pass);
      $profilePic = "assets/images/profile-pics";
      $date = date("Y-m-d");
      $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$uname', '$em', '$encryptedPw', '$date', '$profilePic')");
      return $result;
    }

    private function ValidateUsername($uname){
      if(strlen($uname) > 25 || strlen($uname) < 4){
        array_push($this->errorArray, Constants::$usernameCharacters);
        return;
    }
      }
    private function ValidateEmail($em){
      if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, Constants::$emailInvalid);
        return;
      }

    }
    private function ValidatePassword($pass, $passC){
      if($pass != $passC){
        array_push($this->errorArray, Constants::$passwordDoNoMatch);
        return;
      }
      if(preg_match('/[^A-Za-z0-9]/', $pass)){
        array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
        return;
      }
      if(strlen($pass) > 25 || strlen($pass) < 6){
        array_push($this->errorArray, Constants::$passwordCharacters);
        return;
      }

    }
  }

?>
