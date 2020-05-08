<?php
session_start();
echo "hello we are here";
$itemName = $_POST["name"];
$itemToChange = $_SESSION[$itemName];
$itemToChange->added = 1;
echo $itemToChange->description;

?>