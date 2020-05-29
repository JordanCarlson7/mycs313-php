<?php

require 'accessDB.php';
$db = getDB();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}
  
if (!isset($searchTerm)) {
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects, data_points');
} else {
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects, data_points WHERE profiles.user_name = :user_name');
  $stmt->bindValue(':user_name', $searchTerm, PDO::PARAM_INT);
}


$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$returnString = json_encode($projects);
echo $returnString;

?>