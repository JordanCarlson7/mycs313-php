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
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects, data_points WHERE profiles.user_name = :user_name AND profiles.password = :password');
  $stmt->bindValue(':user_name', $username, PDO::PARAM_INT);
  $stmt->bindValue(':password', $password, PDO::PARAM_INT);
}


$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
              <td><?= $project['data_point']?></td>
              <td><?= $project['data_point']?></td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>   
    <button type="button" onclick="request()">AJAX IT!</button>
    <div id="table"></div>

</body>
</html>