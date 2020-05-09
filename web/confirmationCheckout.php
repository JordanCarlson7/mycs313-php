<?php 
class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
    public $added;
}
session_start();
$items = Array();
$gettingItems = Array();
$temp = new Item();
$gettingItems = $_SESSION['list'];

foreach($gettingItems as $name){
    $temp = $_SESSION[$name];
    
    if ($temp->added > 0){
        $items[$name] = $temp;
    }
}

//Get Address
$streetLine = $_POST["street"];
$stateLine = $_POST["city"] . ", " . $_POST["state"] . ' ' . $_POST["zipCode"];
$streetLine = htmlspecialchars($streetLine);
$stateLine = htmlspecialchars($stateLine);

?>

<!DOCTYPE html>
<html lang="en">    
<head>
<title>Confirmation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="shoppingCart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="shoppingCart.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include "headNav03.php"?>
    <br>
    <div class="row">
    <div class="col-sm-8">
    <?php foreach ($items as $item => $obj):?>
        <br>
        <div class="row" id="<?= $item ?>" data-name="<?=$obj->name?>" data-description="<?= $obj->description ?>" data-price="<?= $obj->price ?>" data-imgfile="<?= $obj->imgfile ?>" data-added="<?= $obj->added ?>">
        <div>
            <h1 class="display-4"><?= $item . ", $" . $obj->price ?><h1>
            <p> <?= $obj->description ?></p>
            <img src="<?= $obj->imgfile ?>" alt="<?= $item ?>">
        </div>
    </div>
    <?php endforeach;?>
    </div>
    <div class="col-sm-4">
    <br>
    Shipping Address:<br><br>
    <?= $streetLine ?>
    <br>
    <?= $stateLine ?>
    </div>
</div>
    <?php include "footer03.php"?>
</body>
</html>