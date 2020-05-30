<?php

require 'accessDB.php';
$db = getDB();

    foreach($_POST as $key => $value){
        echo $key . ": " . $value;
    }
$username = $_POST['username'];
$schedule = $_POST['schedule'];
  echo "user: " . $username;
  echo "sched " . $schedule;
  
  $stmt = $db->prepare('INSERT INTO schedules (user_name, schedule_id) VALUES (:username, :schedule)');

  $stmt->bindValue(':username', $username, PDO::PARAM_INT);
  $stmt->bindValue(':schedule', $schedule, PDO::PARAM_INT);
  
  $stmt->execute();

  $username = $_POST['username'];
  $schedule = $_POST['schedule'];
  $project = $_POST['project'];
  $description_project = $_POST['description_project'];
  
  $stmt = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, timeline) VALUES (:username, :schedule, :project, :description_project)');
  $stmt->bindValue(':username', $username, PDO::PARAM_INT);
  $stmt->bindValue(':schedule', $schedule, PDO::PARAM_INT);
  $stmt->bindValue(':project', $project, PDO::PARAM_INT);
  $stmt->bindValue(':description_project', $description_project, PDO::PARAM_INT);
  //$stmt->bindValue(':timelineStart', $_POST['startDate'], PDO::PARAM_INT);
  //$stmt->bindValue(':timelineEnd', $_POST['endDate'], PDO::PARAM_INT);
  
  
  $stmt->execute();
?>