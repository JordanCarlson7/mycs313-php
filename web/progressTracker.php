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
$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

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
  $stmt = $db->prepare('SELECT * FROM profiles INNER JOIN projects ON profiles.user_name = projects.user_name WHERE projects.user_name = :username');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  //$stmt->bindValue(':password', $password, PDO::PARAM_STR);
}


$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($projects);
//echo "/n/n/n/n/n/n/n/n/n/n/n/n/n/n/n/n/n NEW VAR DUMP";
foreach ($projects as $project){
  //var_dump($project);
  //echo "new project <br>";
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
  <script src="updateTracker.js"></script>
  
</head>
<body>
    <h1>Progress Bar</h1>
    <form action="progressTracker.php" method="GET">
    <input type="text" name="search">
    <button type="submit">Submit User (*try TEST_USER)</button>
    </form>

    <form id="updateForm" action="" method="POST">
      
      <!--Header -->
      <input type="text" id="username" value="<?= $username?>" name="username" style="display:none">
      <label for="schedule">Schedule Name: </label>
      <input type="text" id="schedule"name="schedule" value="">
      <label for="project">Project Name: </label>
      <input type="text" id="project" name="project" value="">
      <label for="desc_proj">Project Description: </label>
      <input name="description" id="description_project" value="" placeholder="Description..."></textarea>
      
      <!--Timeline-->
      <label for="startDate">Start Date: </label>
      <input type="date" id="startDate" name="startDate" value="">
      <label for="endDate">End Date: </label>
      <input type="date" id="endDate" name="endDate" value="">

      <!--Data Point-->
      <label for="title">Name: </label>
      <input type="text" name="title" id="title" value=""> 
      <label for="description">Description: </label>
      <input type="text" name="description_data" id="description_data"> 
      <label for="data_d">Date: </label>
      <input type="date" name="data_d" id="data_d" value="">
      <label type="text" for="attach1">Attachment 1</label>
      <input name="attach1" id="attach1" value="">
      <label type="text" for="attach2">Attachment 2</label>
      <input name="attach2" id="attach2" value="">
      <label type="text" for="attach3">Attachment 3</label>
      <input name="attach3" id="attach3" value=""> 
    
    <button type="button" id="updateButton" onclick="postQuery()">Add/Update settings</button>
    </form>
    
    <nav class="nav"> 
    <select name="scheduleSelect" id="scheduleSelect">
        <?php foreach($projects as $project): ?>
          <option value="<?= $project['schedule_id']?>"><?= $project['schedule_id']?></option>
        <?php endforeach;?>
    </select>
    <select name="projectSelect" id="projectSelect">
        <?php foreach($projects as $project): ?>
          <option value="<?=$project['project_id']?>"><?=$project['project_id']?></option>
        <?php endforeach; ?>
    </select>
    <button type="button" onclick="updateView()">View</button>
    </nav>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">USER</th>
            <th scope="col">SCHEDULE</th>
            <th scope="col">PROJECT</th>
            <th scope="col">START</th>
            <th scope="col">FINISH</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $project):?>
                <tr>
              <td><strong><?= $project['user_name']?></strong></td>
              <td><strong><?= $project['schedule_id'] . ":"?></strong></td>
              <td><strong><?= $project['project_id']?></strong></td>
              <td><?= $project['start_d']?></td>
              <td><?= $project['end_d']?></td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>   
    <button type="button" onclick="request()">AJAX IT!</button>
    <div id="table"></div>

</body>
</html>