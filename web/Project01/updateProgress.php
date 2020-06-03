<?php
/*NO ECHO*/
require 'accessDB.php';
$db = getDB();

    foreach($_POST as $key => $value){
        //echo $key . ": " . $value;
    }

  $username = $_POST['username'];
  $schedule = $_POST['schedule'];
  $project = $_POST['project'];
  $description_project = $_POST['description_project'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $title = $_POST['title'];
  $description_dataPoint = $_POST['description_data'];
  $data_d = $_POST['data_d'];
  $attach1 = $_POST['attach1'];
  $attach2 = $_POST['attach2'];
  $attach3 = $_POST['attach3'];

  //echo "user: " . $username;
  //echo "sched " . $schedule;
  
  $stmt = $db->prepare('INSERT INTO schedules (user_name, schedule_id) VALUES (:username, :schedule)');
  $stmt->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt->bindValue(':schedule', $schedule, PDO::PARAM_STR);
  $stmt->execute();

  
  $stmt1 = $db->prepare('INSERT INTO projects (user_name, schedule_id, project_id, description, start_d, end_d) VALUES (:username, :schedule, :project, :description_project, :timelineStart, :timelineEnd)');
  $stmt1->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt1->bindValue(':schedule', $schedule, PDO::PARAM_STR);
  $stmt1->bindValue(':project', $project, PDO::PARAM_STR);
  $stmt1->bindValue(':description_project', $description_project, PDO::PARAM_STR);
  $stmt1->bindValue(':timelineStart', $startDate, PDO::PARAM_STR);
  $stmt1->bindValue(':timelineEnd', $endDate, PDO::PARAM_STR);
  $stmt1->execute();


  $stmt2 = $db->prepare('INSERT INTO data_points (user_name, project_id, title, description, data_d, attach1, attach2, attach3) VALUES (:username, :project_id, :title, :description_data, :data_d, :attach1, :attach2, :attach3)');
  $stmt2->bindValue(':username', $username, PDO::PARAM_STR);
  $stmt2->bindValue(':project_id', $project, PDO::PARAM_STR);
  $stmt2->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt2->bindValue(':description_data', $description_dataPoint, PDO::PARAM_STR);
  $stmt2->bindValue(':data_d', $data_d, PDO::PARAM_STR);
  $stmt2->bindValue(':attach1', $attach1, PDO::PARAM_STR);
  $stmt2->bindValue(':attach2', $attach2, PDO::PARAM_STR);
  $stmt2->bindValue(':attach3', $attach3, PDO::PARAM_STR);
  $stmt2->execute();  


?>