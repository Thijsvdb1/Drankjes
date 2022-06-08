<?php
   require_once 'header.php';
   require_once __DIR__ . '../vendor/autoload.php';

   session_start();

   function document_builder($title, $discription, $drink, $image) {
      $client = new MongoDB\Client('mongodb+srv://Admin:Admin@cluster0.x3iyf.mongodb.net/?retryWrites=true&w=majority');
      $collection = $client->de_drankjes->$drink;
      $insertOneResult = $collection->insertOne([
         "title" => "$title",
         "collection" => "$drink",
         "discription" => "$discription",
         // "image" => new MongoBinData(file_get_contents($image)),
      ]);
   }
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
   if (isset($_POST['submit'])) { //onpressed
      document_builder($_POST['title'], $_POST['description'], $_POST['drink'], $_POST['image']);
   }
   ?>

   <div class="container"  style="margin-top:10%;">
      <div class="row gx-5">
         <div class="col-4 card">
            <br><br>
            <br><br>
            <form method="POST">
            <label for="drink">Kies een drankje:</label>
               <select name="drink" id="drink">
                  <option value="Whiskey">Whiskey</option>
                  <option value="Wodka">Wodka</option>
                  <option value="Rum">Rum</option>
                  <option value="Wine">Wine</option> 
               </select>
            <br><br>
            <input class="file-upload-input" type="file" name="image" onchange="readURL(this)" accept="image/*">
         </div>
         <div class="col-8 card">
            <br><br>
            <a>Naam</a>
            <input id="..." type="text" name="title" placeholder="drankje">
            <br><br>
            <a>Informatie</a>
            <textarea id="..."  name="description" placeholder="Kleine beschrijving" rows="4" cols="50"></textarea>
            <br><br>
            <input type="submit" name="submit" value="submit" class="button">
            <br><br>
         </div>
         </form>
      </div>
   </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>