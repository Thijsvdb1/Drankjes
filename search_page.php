<?php       
    require_once 'header.php';
    require_once __DIR__ . '../vendor/autoload.php';

    session_start();

    if (isset($_POST['drink'])) {
        $recepieCollection = $_POST['drink'];
    } else {
        $recepieCollection = 'nog niks opgezocht';
    } if (isset($_POST['name'])) {
        $recepieName = $_POST['name'];
    } else {
        $recepieName = 'nog niks opgezocht';
    }

    $client = new MongoDB\Client('mongodb+srv://Admin:Admin@cluster0.x3iyf.mongodb.net/?retryWrites=true&w=majority');
    $collection = $client->de_drankjes->$recepieCollection;
    $document = $collection->FindOne(['title' => "$recepieName"]);
  
    if ($document['_id'] != '') {
        $recepieId = $document['_id'];
    } else {
        $recepieId = 'kan id van document niet vinden';
    } if ($document['discription'] != '') {
        $recepieDiscription = $document['discription'];
    } else {
        $recepieDiscription = 'kan discription van document niet vinden';
    }

    echo $recepieCollection . "<br>";
    echo $recepieName . "<br>";                                 
    echo $recepieId . "<br>";
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
   if (isset($_POST['delete'])) { //onpressed
        $client = new MongoDB\Client('mongodb+srv://Admin:Admin@cluster0.x3iyf.mongodb.net/?retryWrites=true&w=majority');
        $collection = $client->de_drankjes->$recepieCollection;
        $collection->deleteOne(['title' => "$recepieId"]);
        header("location: index.php");
    }
  ?>

    <div class="row gx-5">
        <div class="col-4 card">
            <h3><?php echo $recepieName; ?></h3>
        </div>
        <div class="col-8 card">
            <div class="row gx-5">
                <div class="col-6 buttoncard">
                    <form action="edit_drink.php" method="POST">
                        <?php
                            echo  '<input type="text" name="id" value=' .$recepieId. ' hidden>';
                            echo  '<input type="text" name="title" value=' .$recepieName.  ' hidden>';
                            echo  '<input type="text" name="collection" value=' .$recepieCollection.  ' hidden>';
                            echo  '<input type="text" name="discription" value=' .$recepieDiscription.  ' hidden>';
                        ?>
                        <input type="submit" name="edit" value="edit" class="button">
                    </form>
                </div>
                <div class="col-6 buttoncard">
                    <form method="POST">
                        <?php
                            echo  '<input type="text" name="collection" value=' .$recepieCollection. ' hidden>';
                            echo  '<input type="text" name="id" value=' .$recepieName.  ' hidden>';
                        ?>
                        <input type="submit" name="delete" value="delete" class="button"> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-4 card">

        </div>
        <div class="col-8 card">
            <p><?php echo $recepieDiscription; ?></p>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

</html>