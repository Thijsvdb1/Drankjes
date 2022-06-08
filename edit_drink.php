<?php
   require_once 'header.php';
   require_once __DIR__ . '../vendor/autoload.php';

   session_start();

   if (isset($_POST['id'])) {
       $recepieId = $_POST['id'];
   } else {
       $recepieId = 'id niet meegegeven/kwijtgeraakt';
   }
   if (isset($_POST['collection'])) {
       $recepieCollection = $_POST['collection'];
   } else {
       $recepieCollection = 'collectie niet meegegeven/kwijtgeraakt';
   }
   if (isset($_POST['title'])) {
       $recepieName = $_POST['title'];
   } else {
       $recepieName = 'name niet meegegeven/kwijtgeraakt';
   }
   if (isset($_POST['discription'])) {
       $recepieDiscription = $_POST['discription'];
   } else {
       $recepieDiscription = 'discription niet meegegeven/kwijtgeraakt';
   }

   echo $recepieId . "<br>";
   echo $recepieCollection . "<br>";
   echo $recepieName . "<br>";
   echo $recepieDiscription . "<br>";
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
   if (isset($_POST['update'])) { //onpressed
      $client = new MongoDB\Client('mongodb+srv://Admin:Admin@cluster0.x3iyf.mongodb.net/?retryWrites=true&w=majority');
      $collection = $client->de_drankjes->$recepieCollection;
      $collection->updateOne(
            [ '_id' => new MongoDB\BSON\ObjectId("$recepieId")],
            [ '$set' => [  
                "title" => "$recepieName",
                "discription" => "$recepieDiscription",
                ]
            ]  
        );
   }
   ?>

   <div class="container"  style="margin-top:10%;">
      <div class="row gx-5">
         <div class="col-4 card">
            <br><br>
            <br><br>
            <form method="POST">
            <!-- <input class="file-upload-input" type="file" name="image" onchange="readURL(this)" accept="image/*"> -->
         </div>
         <div class="col-8 card">
            <br><br>
            <a>Naam</a>
            <?php
            echo '<input name="title" value=' . $recepieName . ' type="text"  placeholder="drankje">';
            ?>
            <br><br>
            <a>Informatie</a>
            <?php
            echo '<textarea name="discription" value=' . $recepieDiscription . ' placeholder="Kleine beschrijving" rows="4" cols="50"></textarea>';
            ?>
            <br><br>
            <?php
            echo '<input name="id" value=' . $recepieId . ' type="text" placeholder="drankje" hidden>';
            echo '<input name="collection" value=' . $recepieCollection . ' type="text" placeholder="drankje" hidden>';
            ?>
            <input type="submit" name="update" value="update" class="button">
            <br><br>
         </div>
         </form>
      </div>
   </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>