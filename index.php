<?php

use MongoDB\Operation\FindOne;

  require_once 'header.php';
  require_once __DIR__ . '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maxium-scale=1, user-scalable=no">
  <title> De Drankjes </title>
  <link rel="stylesheet" href="css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <form action="search_page.php" method="POST">
      <div class="row gx-5">
        <div class="col-4 card">
          <label for="drink">Kies een drankje:</label>
          <select name="drink" id="drink">
            <option value="Whiskey">Whiskey</option>
            <option value="Wodka">Wodka</option>
            <option value="Rum">Rum</option>
          </select>
        </div>
        <div class="col-6 card">
          <input id="..." type="text" name="name" placeholder="drankje">
        </div>
        <div class="col-2 card">
          <input type="submit" name="submit" value="submit" class="button">
        </div>
      </div>
    </form>

    <div class="row gx-5">
      <div class="col-3 card">
        <h4>Whiskey</h4>
        <img src="https://lehighvalleystyle.com/downloads/41148/download/Whiskey2.jpg?cb=c7eb664497a06490b488cc2a8df1160e&w=1200" class="photo"></img>
        <a href="whiskey.php"><button class="button">recepten</button></a>
      </div>
      <div class="col-3 card">
        <h4>Wodka</h4>
        <img src="https://i.pinimg.com/originals/7d/64/95/7d64950c6dbd366d2ff367fb997d2353.jpg" class="photo"></img>
        <a href="wodka.php"><button class="button">recepten</button></a>
      </div>
      <div class="col-3 card">
        <h4>Rum</h4>
        <img src="https://whiskeywatch.com/wp-content/uploads/2019/06/bourbon-glass-1.png" class="photo"></img>
        <a href="rum.php"><button class="button">recepten</button></a>
      </div>
      <div class="col-3 card">
        <h4>Overige</h4>
        <img src="https://buddy20.com/images/dare/question_images/e17/c.jpg?v=6" class="photo"></img>
        <a href="..."><button class="button">recepten</button></a>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>