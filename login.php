<?php
include("includes/handlers/login_handler.php")

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
        <li><a href="signup.php">Sign up</a></li>
      </ul>
    </nav>
    <main>
      <section class="section-home">
        <div class="home-Contact">
          <div class="contact-login">
              <p>Am home  Now</p>
              <form class="login-1" action="index.html" method="post">
                <label for="LoginEmail">Email address</label><br>
                <input id="LoginEmail"type="email" name="LoginEmail" value=""required><br>
                <label for="LoginPassword">Password</label><br>
                <input id="LoginPassword"type="password" name="LoginPassword" value=""required><br>
                <input type="checkbox" name="checkbox" value=""required>
                <label for="checkbox"></label><br>
                <button class="form-submit"type="submit" name="LoginButton">Sign in</button><br>
                <!-- <span class="form-span">or</span> -->
              </form>
              <!-- <p class="create-account"><a href="signup.html">Create an account</a></p> -->
          </div>
          <img src="assets/img/home.svg" alt="">
        </div>

      </section>
    </main>
  </body>
</html>
