<?php

class Item {
    public $name;
    public $price;
    public $description;
    public $imgfile;
    public $added;
}

session_start();
print_r($_SESSION);

$name = $_POST['name'];

//value needs to be the same custom data type in order for the php file to handel it, must be declared before getting from SESSION.
//Session does not remember custom data types declarations between php files.
$temp = new Item();
$temp = $_SESSION[$name];

print $temp->description;

//Show that the item was removed from the shopping cart
$temp->added = 0;
//update the item in the session
$_SESSION[$name] = $temp;

print_r($_SESSION);

?>