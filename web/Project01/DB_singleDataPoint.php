<?php
/*NO ECHO pg is ajax requested*/
require '../accessDB.php';
$db = getDB();

  if (isset($_POST['dataPointDelete'])){
    deleteDataPoint($db);
    
  }

  if (isset($_POST['titlep'])) {
    if (isset($_POST['projectp'])){
        $project = $_POST['projectp'];
        $username = $_POST['usernamep'];
        $title = $_POST['titlep'];
        $description_dataPoint = $_POST['description_datap'];
        $data_d = $_POST['data_dp'];
        $attach1 = $_POST['attach1p'];
        $attach2 = $_POST['attach2p'];
        $attach3 = $_POST['attach3p'];
      }
      newData($db, $project, $username, $title, $description_dataPoint, $data_d, $attach1, $attach2, $attach3);
  }

    function newData($db, $project, $username, $title, $description_dataPoint, $data_d, $attach1, $attach2, $attach3){
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
    }
  
    function deleteDataPoint($db){
    $username = $_POST['username'];
    $dataPointDelete = $_POST['dataPointDelete'];
  
    $stmt3 = $db->prepare('DELETE FROM data_points WHERE user_name = :username AND title = :dataTitle');
    $stmt3->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt3->bindValue(':dataTitle', $dataPointDelete, PDO::PARAM_STR);
    $stmt3->execute();
    }
  


?>