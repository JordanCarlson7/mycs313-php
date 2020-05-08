<?php
session_start();
echo "hello we are here";
echo $_POST["name"];
$changingValue = $_SESSION[$_POST["name"]];
echo $changingValue->name;
$changingValue->added = 1;
echo $changingValue->description;
foreach($_SESSION as $part){
    echo $part;
}
foreach($_SESSION as $part){
    echo $part["name"];
}
?>