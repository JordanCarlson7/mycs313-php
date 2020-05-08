<?php
session_start();
print_r($_SESSION);

print ($_SESSION["Soda"]);

print unserialize(($_SESSION["Soda"]));
/*
echo "hello we are here";
$itemName = $_POST["name"];
$itemToChange = $_SESSION[$itemName];
$itemToChange->added = 1;
echo $itemToChange->description;
*/
?>