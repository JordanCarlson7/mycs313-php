<?php
echo $_POST["name"];
$changingValue = $_SESSION[$_POST["name"]];
echo $changingValue->name;
$changingValue->added = 1;

?>