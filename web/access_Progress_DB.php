<?php

require 'accessDB.php';
$db = getDB();
foreach ($_POST as $key => $value){
  //echo $key . ": " . $value;
}
  
$stmt = $db->prepare('SELECT title, description, data_d, attach1, attach2, attach3 FROM data_points WHERE user_name = :user_name AND project_id = :project_id');
$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
$stmnt->bindValue(':project_id', $project, PDO::PARAM_STR);

$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($datas);
echo $returnString;
?>