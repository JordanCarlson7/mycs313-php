<?php
require 'accessDB.php';
$db = getDB();
foreach ($_POST as $key => $value){
  //echo $key . ": " . $value;
}

$username = $_POST['username'];
$schedule = $_POST['schedule'];
$project = $_POST['project'];

$stmt = $db->prepare('SELECT * FROM data_points INNER JOIN projects ON data_points.project_id = projects.project_id WHERE projects.user_name = :username AND projects.project_id = :project_id');

$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':project_id', $project, PDO::PARAM_STR);
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($datas);
echo $returnString;
?>