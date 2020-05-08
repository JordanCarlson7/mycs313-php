<?php
session_start();
print_r($_SESSION);

print ($_SESSION["Soda"]);
$item = ($_SESSION["Soda"]);
$reverted = unserialize($item);

print $reverted;
/*
echo "hello we are here";
$itemName = $_POST["name"];
$itemToChange = $_SESSION[$itemName];
$itemToChange->added = 1;
echo $itemToChange->description;
*/
?>