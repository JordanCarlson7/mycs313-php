<?php

require 'accessDB.php';
$db = getDB();
foreach ($_POST as $key => $value){
  //echo $key . ": " . $value;
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $schedule = $_POST['schedule'];
    $project = $_POST['project'];
}
  
$stmt = $db->prepare('SELECT title, description, data_d, attach1, attach2, attach3 FROM data_points');
//$stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
//$stmnt->bindValue(':project_id', $project, PDO::PARAM_INT);

$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($datas);
echo $returnString;
?>