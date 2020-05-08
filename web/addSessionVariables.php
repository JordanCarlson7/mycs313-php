<?php
session_start();
echo "hello we are here";
echo $_POST["name"];
$itemsArray = $_SESSION['items'][$_POST["name"]];
$itemsArray['name']->added = 1;
echo $itemsArray['name']->description;

?>