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

  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':schedule', $schedule);
  
  $stmt->execute();

  die();

  $project = $_POST['project'];
  $description_project = $_POST['description_project'];
  $startDate = $_POST['startDate'];
  
  $stmt1 = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, start_d, end_d) VALUES (:username, :schedule, :project, :description_project, :timelineStart, :timelineEnd)');
  $stmt1->bindValue(':username', $username);
  $stmt1->bindValue(':schedule', $schedule);
  $stmt1->bindValue(':project', $project);
  $stmt1->bindValue(':description_project', $description_project);
  $stmt1->bindValue(':timelineStart', $startDate);
  $stmt1->bindValue(':timelineEnd', $endDate);
  
  
  $stmt1->execute();
?>