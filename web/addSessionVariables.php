<?php
session_start();
print_r($_SESSION);

print ($_SESSION["Soda"]);
$item = ($_SESSION["Soda"]);
$item->added = 1;
print $item["name"];
print $item["price"];
print $item["description"];
print $item["added"];
/*
echo "hello we are here";
$itemName = $_POST["name"];
$itemToChange = $_SESSION[$itemName];
$itemToChange->added = 1;
echo $itemToChange->description;
*/
?>