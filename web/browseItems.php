<?php
session_start();

class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
    public $added;
}

$boat = new Item();
$boat->name = "Boat";
$boat->price = "8000";
$boat->description = "Large personal yacht for friends and family";
$boat->imgfile = "yacht.jpg";
$boat->added = 0;

$plane = new Item();
$plane->name = "Plane";
$plane->price = "15000";
$plane->description = "Small bush plane for leisure and travel";
$plane->imgfile = "biPlane.jpg";
$plane->added = 0;

$guitar = new Item();
$guitar->name = "Guitar";
$guitar->price = "3000";
$guitar->description = "Jam out and become a rock star or family band-member";
$guitar->imgfile = "guitar.jpg";
$guitar->added = 0;

$soda = new Item();
$soda->name = "Soda";
$soda->price = "1";
$soda->description = "sit back and enjoy a refreshing beverage";
$soda->imgfile = "sodaBottle.jpg";
$soda->added = 0;

$items = [
    "Boat" => $boat,
    "Plane" => $plane,
    "Guitar" => $guitar,
    "Soda" => $soda
];

$_SESSION["Boat"] = $boat;
$_SESSION["Plane"] = $Plane;
$_SESSION["Guitar"] = $Guitar;
$_SESSION["Soda"] = $soda;

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
<?php include "headNav03.php" ?>
<div class="row">
    <div class="col-sm-8">
    <?php foreach ($items as $item => $obj):?>
        <div class="row" id="<?= $item ?>" data-name="<?=$obj->name?>" data-description="<?= $obj->description ?>" data-price="<?= $obj->price ?>" data-imgfile="<?= $obj->imgfile ?>" data-added="<?= $obj->added ?>">
        <div>
            <?= $item . ", $" . $obj->price ?>
            <p> <?= $obj->description ?></p>
            <img src="<?= $obj->imgfile ?>" alt="<?= $item ?>">
            <button type="button" id="<?= $item . "button" ?>" data-object="<?= json_encode($obj)?>" onclick="addToCart(this)" class="bg-dark light">Add To Cart</button>
        </div>
    </div>
    <?php endforeach;?>
    </div>
    <div class="col-sm-4">
    <a href="viewCart.php" id="toCart" class="bg-dark light">View Cart</a>
    </div>
</div>
<?php include "footer03.php" ?>
</body>
</html>