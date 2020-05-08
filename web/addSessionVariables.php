<?php
session_start();
echo "hello we are here";
echo $_POST["name"];
$changingValue = $_SESSION[$_POST["name"]];
echo $changingValue->name;
$changingValue->added = 1;
foreach ($changingValue as $prop => $value){
    echo $prop . "= " . $value;
}

?>