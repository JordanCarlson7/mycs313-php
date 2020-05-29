<?php

require 'accessDB.php';

    foreach($_POST as $key => $value){
        echo $key . ": " . $value;
    }

  $db = getDB();
  $stmt = $db->prepare('INSERT INTO schedules (user_name, schedule_id) VALUES (:username, :schedule)');
  $stmt->bindValue(':username', $_POST['username'], PDO::PARAM_INT);
  $stmt->bindValue(':schedule', $_POST['schedule'], PDO::PARAM_INT);
  
  $stmt->execute();

  /*
  $stmt = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, timeline) VALUES (:username, :schedule, :project, :description_project, (:timelineStart, :timelineEnd)');
  $stmt->bindValue(':username', $_POST['username'], PDO::PARAM_INT);
  $stmt->bindValue(':schedule', $_POST['schedule'], PDO::PARAM_INT);
  $stmt->bindValue(':project', $_POST['project'], PDO::PARAM_INT);
  $stmt->bindValue(':description_project', $_POST['description_project'], PDO::PARAM_INT);
  $stmt->bindValue(':timelineStart', $_POST['startDate'], PDO::PARAM_INT);
  $stmt->bindValue(':timelineEnd', $_POST['endDate'], PDO::PARAM_INT);
  
  
  $stmt->execute();
*/
?>