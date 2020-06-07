<?php
require '../accessDB.php';
$db = getDB();

// $searchTerm = filter_var(INPUT_GET, 'search', FILTER_SANITIZE_STRING);\
if (isset($_POST['username'])) {
  $username = htmlspecialchars($_POST['username']);
}
if (isset($_POST['password'])){
  $password = $_POST['password'];
}

//check in database for profile
$stmt = $db->prepare('SELECT * FROM profiles WHERE profiles.user_name = :user_name AND profiles.password = :password');
$stmt->bindValue(':user_name', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->execute();
$profile = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($profile) {
  $loggedIn = true;
}
//$passwordVerified = password_verify($password, $profile['password']);
/*
if($passwordVerified){
  $loggedIn = true;
}
else {
  var_dump($profile);
 // header("Location: ptLogin.php");
  die();
}
*/
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="pt.css">
  <script src="pt.js"></script>
  <script src="updateTracker.js"></script>
</head>

<body class="mainBody">
    <h1>Progress Bar</h1>
    <form id="updateForm" action="" method="POST">
      <h3>Add New Project w/1 Data Point</h3>
      
      <!--Header -->
      <input type="text" id="username" value="<?= $username?>" name="username" style="display:none">
      <label for="schedule">Schedule Name: </label>
      <input type="text" id="schedule"name="schedule" value="">
      
      <br>
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
      <br>
      <label for="title">Milestone Title: </label>
      <input type="text" name="title" id="title" value=""> 
      <label for="description">Description: </label>
      <input type="text" name="description_data" id="description_data"> 
      <label for="data_d">Date: </label>
      <input type="date" name="data_d" id="data_d" value="">
      <label type="text" for="attach1">Attachment 1</label>
      <input name="attach1" id="attach1" value="TEST2.JPG">
      <label type="text" for="attach2">Attachment 2</label>
      <input name="attach2" id="attach2" value="TEST3.JPG">
      <label type="text" for="attach3">Attachment 3</label>
      <input name="attach3" id="attach3" value="TEST1.JPG"> 
    
    <button type="button" id="updateButton" onclick="postUpdateQuery(this.id)">Add/Update settings</button>
    </form>

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

    
    <nav class="nav"> 
    <br><br>
    <label for="projectSelect" style="background-color:red"></label>
    <select name="projectSelect" id="projectSelect">
        <?php foreach($projects as $project): ?>
          <option value="<?=$project['project_id']?>"><?=$project['project_id']?></option>
        <?php endforeach; ?>
    </select>
    <button type="button" onclick="selectProgress()">View</button>
    </nav>

     <!--Data Point-->
     <form id="newDataPoint">
       <h3>Add New Data Point</h3>
       <input type="text" id="usernamep" value="<?= $username?>" name="usernamep" style="display:none">
     <label for="title">Name: </label>
      <input type="text" name="title" id="titlep" value=""> 
      <label for="description">Description: </label>
      <input type="text" name="description_data" id="description_datap"> 
      <label for="data_d">Date: </label>
      <input type="date" name="data_d" id="data_dp" value="">
      <label type="text" for="attach1">Attachment 1</label>
      <input name="attach1" id="attach1p" value="TEST1.JPG">
      <label type="text" for="attach2p">Attachment 2</label>
      <input name="attach2" id="attach2p" value="TEST2.JPG">
      <label type="text" for="attach3">Attachment 3</label>
      <input name="attach3" id="attach3p" value="TEST3.JPG"> 
    
    <button type="button" id="updateDataPoints" onclick="postSingleUpdateQuery(this.id)">Add/Update settings</button>
    </form>


    <div id="dataPointBars">
        
    </div>          
</body>
</html>