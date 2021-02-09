<?php

print "phpfound";
try
{
  
  $dbHost = "localhost";
  $dbPort = "5432";
  $dbUser = "postrgres";
  $dbPassword = "";
  $dbName = "onlinejournal";

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT * FROM users') as $row)
{
  echo 'First Name: ' . $row['userEmail'];
  echo ' Last Name: ' . $row['userLastName'];
  echo '<br/>';
}

?>