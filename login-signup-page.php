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

      <div id="container-log-sign">

        <div id="blocklogin" class="block login ">
          <div>
            <h1>Login</h1>
            <p>korte informatie. join puzlo en krijg bereik tot vele voordelen in je dagelijkse shopehlic life!</p>
            <form class="form form-login" action="php/.....php" method="POST">
              <p class="titel-input">Email or Username:</p>
              <input type="text" name="accountidname" placeholder="Email/Username">
              <p class="titel-input">Password:</p>
              <input type="password" name="pwd" placeholder="Password">
              <br>
              <button type="submit" name="sumit">Login</button>
            </form>
          </div>
        </div>
        <div id="blocksignup" class="block sign-up">

        </div>
      </div>
    </main>

</body>

</html>
