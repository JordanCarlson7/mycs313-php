<?php
require 'accessDB.php';
$db = getDB();


// $searchTerm = filter_var(INPUT_GET, 'search', FILTER_SANITIZE_STRING);\
if (isset($_POST['username'])) {
  $username = $_POST['username'];
}
if (isset($_POST['password'])) {
  $password = $_POST['password'];
}

//check in database for profile
$stmt = $db->prepare('SELECT user_name, password FROM profiles WHERE profiles.user_name = :user_name AND profiles.password = :password');
  $stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
  $stmt->bindValue(':password', $password, PDO::PARAM_INT);
  
$stmt->execute();
$profile = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($profile){
  $loggedIn = true;
}
else {
  header("Location: progressTrackerLogin.php");
  die();
}


//GET PROFILE DATA
if (!$loggedIn) {
  $stmt = $db->prepare('');
} 
else {
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects WHERE profiles.user_name = :user_name AND profiles.password = :password');
  $stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
  $stmt->bindValue(':password', $password, PDO::PARAM_INT);
}


$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($projects as $project){
  echo $project;
}


//get Datapoints
if (!$loggedIn) {
  $stmt = $db->prepare('');
} 
else {
  $stmt = $db->prepare('SELECT data_point FROM data_points WHERE data_points.user_name = :user_name');
  $stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
}


$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($datas as $data){
  echo $data->title;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="progressTracker.css">
  <script src="progressTracker.js"></script>
  
</head>
<body>
    <h1>Progress Bar</h1>
    <form action="progressTracker.php" method="GET">
    <input type="text" name="search">
    <button type="submit">Submit User (*try TEST_USER)</button>
    </form>
    
    <nav class="nav"> 
    <select name="schedule" id="schedule">
        <?php foreach($projects as $project): ?>
          <option value="<?= $project['schedule_id']?>"><?= $project['schedule_id']?></option>
        <?php endforeach;?>
    </select>
    <select>
        <?php foreach($projects as $project): ?>
          <option value="<?= $project['project_id']?>"><?= $project['project_id']?></option>
        <?php endforeach;?>
    </select>
    </nav>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">USER</th>
            <th scope="col">SCHEDULE</th>
            <th scope="col">PROJECT</th>
            <th scope="col">TIMELINE</th>
            <th scope="col">DATA_POINT</th>
            <th scope="col">DATA_POINT</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $project):?>
                <tr>
              <td><strong><?= $project['user_name']?></strong></td>
              <td><strong><?= $project['schedule_id'] . ":"?></strong></td>
              <td><strong><?= $project['project_id']?></strong></td>
              <td><?= $project['timeline']?></td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>   
    <button type="button" onclick="request()">AJAX IT!</button>
    <div id="table"></div>

</body>
</html>