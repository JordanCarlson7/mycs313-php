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
  $startDate = $_POST['startDate'];
  
  $stmt = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, start_d, end_d) VALUES (:username, :schedule, :project, :description_project, :timelineStart, :timelineEnd)');
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':schedule', $schedule);
  $stmt->bindValue(':project', $project);
  $stmt->bindValue(':description_project', $description_project);
  $stmt->bindValue(':timelineStart', $startDate);
  $stmt->bindValue(':timelineEnd', $endDate);
  
  
  $stmt->execute();
?>