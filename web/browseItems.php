<?php

class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
}

$boat = new Item();
$boat->name = "boat";
$boat->price = "8000";
$boat->description = "Large personal yacht for friends and family";
$boat->imgfile = "";

$plane = new Item();
$plane->name = "plane";
$plane->price = "15000";
$plane->description = "Small bush plane for leisure and travel";
$plane->imgfile = "";

$guitar = new Item();
$guitar->name = "guitar";
$guitar->price = "3000";
$guitar->description = "Jam out and become a rock star or family band-member";
$guitar->imgfile = "";

$soda = new Item();
$soda->name = "soda";
$soda->price = "1";
$soda->description = "sit back and enjoy a refreshing beverage";
$soda->imgfile = "";

$items = [
    "Boat" => $boat,
    "Plane" => $plane,
    "Guitar" => $guitar,
    "Soda" => $soda
]
?>


<!DOCTYPE html>
<html lang="en">    
<head>
<title>Item Browser</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="shoppingCart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="shoppingCart.js"></script>
</head>
<body>
<header class="display-1">Title</header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
</nav> 
<div class="row">
    <div class="col-sm-8">
    <?php foreach ($items as $item => $obj):?>
        <div class="row" id="<?= $item ?>" name="<?= $item ?>" value="<?= $obg->price ?>">
        <div>
            <?= $item . ", $" . $obj->price ?>
            <p> <?= $obj->description ?></p>
            <img src="<?= $obj->imgfile ?>" alt="<?= $item ?>">
            <button type="button" id="<? $item . $obj->price ?>" onclick="addToCart()" class="bg-dark">
        </div>
    </div>
    <?php endforeach;?>
    </div>
    <div class="col-sm-4">
    <button type="button" id="toCart" onclick="toCart()" class="bg-dark">
    </div>
</div>
<footer class="bg-dark navbar-dark display-3">Footer</footer>
</body>
</html>