<?php
    require '../accessDB.php';
    $db = getDB();

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

   $stmt = $db->prepare('INSERT INTO profiles (user_name, password) VALUES (:username, :password)');
   $stmt->bindValue(':username',$username,PDO::PARAM_STR);
   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
   $stmt->execute();
   
   $schedule = "default";
  
   $stmt1 = $db->prepare('INSERT INTO schedules (user_name, schedule_id) VALUES (:username, :schedule)');
   $stmt1->bindValue(':username', $username, PDO::PARAM_STR);
   $stmt1->bindValue(':schedule', $schedule, PDO::PARAM_STR);
   $stmt1->execute();
 


   header('Location: ptLogin.php');

?>