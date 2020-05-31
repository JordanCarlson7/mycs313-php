<?php
require 'accessDB.php';
$db = getDB();
foreach ($_POST as $key => $value){
  //echo $key . ": " . $value;
}

$username = $_POST['username'];
$schedule = $_POST['schedule'];

$stmt = $db->prepare('SELECT * FROM data_points INNER JOIN projects ON data_points.project_id = projects.project_id WHERE projects.user_name = :username');

$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($datas);
echo $returnString;
?>