<?php 
class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
    public $added;
}
session_start();
echo "here1";
$items = Array();
$temp = new Item();
foreach($_SESSION as $key){
    $temp = $_SESSION[${$key}];
    echo $temp->name;
}
//$temp = $_SESSION["Boat"];

echo "here";


?>
<!DOCTYPE html>
<html lang="en">    
<head>
<title>Item Browser</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="shoppingCart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="shoppingCart.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php include "headNav03.php"?>

<div class="row">
    <div class="col-sm-8">
    <?php foreach ($items as $item => $obj):?>
        <div class="row" id="<?= $item ?>" data-name="<?=$obj->name?>" data-description="<?= $obj->description ?>" data-price="<?= $obj->price ?>" data-imgfile="<?= $obj->imgfile ?>" data-added="<?= $obj->added ?>">
        <div>
            <?= $item . ", $" . $obj->price ?>
            <p> <?= $obj->description ?></p>
            <img src="<?= $obj->imgfile ?>" alt="<?= $item ?>">
            <button type="button" id="<?= $item . "button" ?>" data-object="<?= json_encode($obj)?>" onclick="removeFromCart(this)" class="bg-dark light">Remove From Cart</button>
        </div>
    </div>
    <?php endforeach;?>
    </div>
</div>
<?php include "footer03.php" ?>
</body>
</html>