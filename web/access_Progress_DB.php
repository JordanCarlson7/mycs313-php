<?php

require 'accessDB.php';
$db = getDB();
foreach ($_POST as $key => $value){
  //echo $key . ": " . $value;
}

$username = $_POST['username'];
$schedule = $_POST['schedule'];
  
$stmt = $db->prepare('SELECT user_name, project_id, title, description, data_d, attach1, attach2, attach3 FROM data_points WHERE data_points.user_name = :username AND data_points.project_id = :project_id');
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmnt->bindValue(':project_id', $project, PDO::PARAM_STR);

$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($datas);
echo $returnString;
?>