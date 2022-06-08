<?php
    require_once 'header.php';
    require_once __DIR__ . '../vendor/autoload.php';

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maxium-scale=1, user-scalable=no">
    <title> De rum </title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

    <?php
      $client = new MongoDB\Client('mongodb+srv://Admin:Admin@cluster0.x3iyf.mongodb.net/?retryWrites=true&w=majority');
      $collection = $client->de_drankjes->Whiskey;
      $cursor = $collection->find();
    ?>

    <div class="container" style="margin-top:10%;">
    <div class="row rg-5">
    <?php
      foreach ($cursor as $document) {
        echo  "<div class='col-3 card'>";
        echo  $document["title"] . "<br>";
        echo  $document["discription"] . "<br>";
        echo  $document["collection"] . "<br>";
        echo  '<form action="single_recepie.php" method="POST">';
        echo  '<input type="text" name="id" value=' .$document['_id']. ' hidden>';
        echo  '<input type="text" name="title" value=' .$document['title']. ' hidden>';
        echo  '<input type="text" name="collection" value=' .$document['collection']. ' hidden>';
        echo  '<input type="text" name="discription" value=' .$document['discription']. ' hidden>';
        echo  '<input type="submit" name="submit" value="zie volledig" class="button">';
        echo  '</form>';
        // $imagebody = $document["image"];
        // $base64 = base64_encode($imagebody);
        echo "</div>";
      }
    ?> 
    </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

</html>