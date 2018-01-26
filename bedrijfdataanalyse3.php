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
  ?>
    <main>
      <div class="container-bedrijfdataanalyse">
        <div>
          <canvas id="insertchart"></canvas>
        </div>
      </div>
      <div class="container-analyseopties">
        <a href="bedrijfdataanalyse.php" class="button-1">1</a>
        <a href="bedrijfdataanalyse2.php" class="button-2">2</a>
        <a href="bedrijfdataanalyse3.php" class="button-3">3</a>
        <a href="bedrijfdataanalyse4.php" class="button-4">4</a>
        <a href="bedrijfdataanalyse5.php" class="button-5">5</a>
      </div>
    </main>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
    <script type="text/javascript" src="js/users-chart3.js"></script>
</body>

</html>
