<?php
session_start();
echo "hello we are here";
echo $_POST["name"];
$itemToChange = $_SESSION[$_POST["name"]];
$itemToChange->added = 1;
echo $itemToChange->description;

?>