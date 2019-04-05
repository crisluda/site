<?php

include("includes/config.php");
include("includes/classes/Account.php");

$account = new Account($con);

function getInputValue($name){
  if(isset($_POST[$name])){
    echo $_POST[$name];
  }
}


function SanitizeFormUsername($inputText){
$inputText = strip_tags($inputText);
$inputText = str_replace(" ", "", $inputText);
$inputText=htmlentities(trim($inputText));
return $inputText;
}




if(isset($_POST)){

$username=trim(htmlentities(stripslashes(SanitizeFormUsername($_POST['SignupUsername']))));
$SignupEmail=SanitizeFormUsername($_POST['SignupEmail']);
$SignupPassword=SanitizeFormUsername($_POST['SignupPassword']);


if($username && $SignupEmail && $SignupPassword){

     $save=$account->signup($username,$SignupEmail,$SignupPassword,$_POST['SignupPasswordConfirm']);

}

else{
     echo "<p style='color:red;'>Complete the fields.</p>";
}
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <nav>
      <ul class="section-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="#">Contact </a></li>
        <li><a href="login.php">Log In</a></li>
      </ul>
    </nav>
    <main>
      <section class="section-home">
        <div class="home-Contact">
          <div class="contact-login">
              <p>Sign up with your email address</p>
              <form class="login-1 signup" action="" method="post">
                <span><?php echo $account->getError(Constants::$usernameCharacters);  ?></span>
                <span><?php echo $account->getError(Constants::$emailInvalid);  ?></span>
                <span><?php echo $account->getError(Constants::$passwordDoNoMatch);  ?></span>
                <span><?php echo $account->getError(Constants::$passwordNotAlphanumeric);  ?></span>
                <span><?php echo $account->getError(Constants::$passwordCharacters);  ?></span><br>
                <label class="usernameLabel"for="SignupUsername">Username</label>
                <input id="SignupUsername"type="text" name="SignupUsername" value="<?php getInputValue('SignupUsername') ?>"required>
                <label for="SignupEmail">Email address</label><br>
                <input id="SignupEmail"type="email" name="SignupEmail" value="<?php getInputValue('SignupEmail') ?>"required><br>
                <label for="SignupPassword">Password</label><br>
                <input id="SignupPassword"type="password" name="SignupPassword" value=""required><br>
                <input type="password" name="SignupPasswordConfirm" value=""required placeholder="comfirm password"><br>
                <label for="SignupYear">Date of birth</label><br>
                <select class="form-month form-dob" name="SignupYear" required>
                  <option selected>January</option>
                  <option>February</option>
                  <option>March</option>
                  <option>April</option>
                  <option>May</option>
                  <option>June</option>
                  <option>July</option>
                  <option>August</option>
                  <option>September</option>
                  <option>October</option>
                  <option>November</option>
                  <option>December</option>
                </select>
                <!-- <input type="month" name="" value=""placeholder="Month"> -->
                <input class="form-dob day-year day-year-both" type="number" name="day" value="<?php getInputValue('day') ?>"required placeholder="Day">
                <input class="form-dob day-year-both" type="number" name="year" value="<?php getInputValue('year') ?>"required placeholder="Year"><br>
                <div class="form-sex"style="padding: 15px 0px 10px 0px;">
                <input class="form-sex-radio-male" type="radio" name="sex" value="" required><label class="form-sex-label" for="male">Male</label><br>
              <input class="form-sex-radio"type="radio" name="sex" value=""><label class="form-sex-label" for="female">Female</label><br>
            <input class="form-sex-radio"type="radio" name="sex" value=""><label class="form-sex-label"for="others">Others</label>
                </div>


                <button type="submit" name="SignupButton">Sign up</button><br>
                <!-- <span class="form-span">or</span> -->
              </form>
              <!-- <p class="create-account">Already have an account? <a href="login.html">Log in</a></p> -->
          </div>
          <img src="assets/img/about.svg" alt="">
        </div>

      </section>
    </main>
  </body>
</html>
