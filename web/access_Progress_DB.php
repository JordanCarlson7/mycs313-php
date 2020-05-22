<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}


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