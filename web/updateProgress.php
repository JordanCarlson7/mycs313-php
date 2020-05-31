<?php
/*NO ECHO*/
require 'accessDB.php';
$db = getDB();

    foreach($_POST as $key => $value){
        //echo $key . ": " . $value;
    }

$username = $_POST['username'];
$schedule = $_POST['schedule'];
  //echo "user: " . $username;
  //echo "sched " . $schedule;
  
  $stmt = $db->prepare('INSERT INTO schedules (user_name, schedule_id) VALUES (:username, :schedule)');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':schedule', $schedule, PDO::PARAM_STR);
  
  $stmt->execute();

  $project = $_POST['project'];
  $description_project = $_POST['description_project'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];

  $stmt1 = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, start_d, end_d) VALUES (:username, :schedule, :project, :description_project, :timelineStart, :timelineEnd)');
  $stmt1->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt1->bindValue(':schedule', $schedule, PDO::PARAM_STR);
  $stmt1->bindValue(':project', $project, PDO::PARAM_STR);
  $stmt1->bindValue(':description_project', $description_project, PDO::PARAM_STR);
  $stmt1->bindValue(':timelineStart', $startDate, PDO::PARAM_STR);
  $stmt1->bindValue(':timelineEnd', $endDate, PDO::PARAM_STR);
  
  
  $stmt1->execute();
?>