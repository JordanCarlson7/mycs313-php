<?php

class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
    public $added;
}

session_start();
$name = $_POST['name'];
print_r($_SESSION);
$temp = new Item();
$temp = $_SESSION[$name];
print $temp->description;
$temp->added = 1;
$_SESSION[$name] = $temp;
print_r($_SESSION);


//print ($_SESSION["Soda"]);
/*
$item = $_SESSION["Soda"];
$item->added = 1;
print $item["name"];
print $item["price"];
print $item["description"];
print $item["added"];*/
/*
echo "hello we are here";
$itemName = $_POST["name"];
$itemToChange = $_SESSION[$itemName];
$itemToChange->added = 1;
echo $itemToChange->description;
*/
?>