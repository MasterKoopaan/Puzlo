<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles\main.css">
  <title>Puzlo | ?.......</title>
</head>

<body>

  <?php
    include 'php/header.php';
    // $state = $_GET["state"];
    // if ($state = "sign") {
    //   displayLoginFunction();
    // } else {
    //   displaySignupFunction();
    // }
  ?>

    <main>
 <!-- add dis voor grooter maken, moet eigenlijk nog met js/php block-display -->
      <div id="container-log-sign">

        <div id="blocklogin" class="block login ">
          <div>
            <h1>Login</h1>
            <p>korte informatie. join puzlo en krijg bereik tot vele voordelen in je dagelijkse shopehlic life!</p>
            <form class="form form-login" action="php/login.php" method="POST">
              <p class="titel-input">Email or Username:</p>
              <input type="text" name="accountidname" placeholder="Email/Username">
              <p class="titel-input">Password:</p>
              <input type="password" name="pwd" placeholder="Password">
              <br>
              <button type="submit" name="sumit">Login</button>
            </form>
            <p class="note-text">*Alleen bedrijf acounts kunnen inloggen op het moment*</p>
          </div>
        </div>
        <div id="blocksignup" class="block sign-up">
          <div>
             <h1>Signup</h1>
            <p>korte informatie. join puzlo en krijg bereik tot vele voordelen in je dagelijkse shopehlic life!</p>
            <form class="form form-signup" action="php/register.php" method="POST">
              <p class="titel-input">Username:</p>
              <input type="text" name="accountidname" placeholder="Username">
			  
              <p class="titel-input">Email:</p>
              <input type="text" name="accountemail" placeholder="Email">
			  
			  <p class="titel-input">:Leeftijd:</p>
              <input type="number" name="accountage" placeholder="Age">
			  
              <p class="titel-input">Password:</p>
              <input type="password" name="pwd" placeholder="Password">
			  
              <p class="titel-input">Herhaal Password:</p>
              <input type="password" name="pwd2" placeholder="Herhaal Password">
              <br>
              <button type="submit" name="sumit">Signup</button>
            </form>
          </div>
        </div>
      </div>
    </main>

</body>

</html>
