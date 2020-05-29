<?php
require 'accessDB.php';

    foreach($_POST as $key => $value){
        echo $key . ": " . $value;
    }

    /*
  $stmt = $db->prepare('INSERT INTO data_point FROM data_points WHERE data_points.user_name = :user_name');
  $stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
  
  $stmt->execute();
  */

?>