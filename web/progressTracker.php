<?php
// $searchTerm = filter_var(INPUT_GET, 'search', FILTER_SANITIZE_STRING);\
if (isset($_GET['search'])) {
  $searchTerm = $_GET['search'];
}

function dd($var) {
  var_dump($var);
  die();
}

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



if (!isset($searchTerm)) {
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects, data_points');
} else {
  $stmt = $db->prepare('SELECT * FROM profiles, schedules, projects, data_points WHERE user_name = :user_name');
  $stmt->bindValue(':user_name', $searchTerm, PDO::PARAM_INT);
}

$stmt->execute();

$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
</head>
<body>
    <h1>Progress Bar</h1>
    <form action="progressTracker.php" method="GET">
    <input type="text" name="search">
    <button type="submit">Submit</button>
    </form>
    
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">USER</th>
            <th scope="col">SCHEDULE</th>
            <th scope="col">PROJECT</th>
            <th scope="col">TIMELINE</th>
            <th scope="col">DATA_POINT</th>
            <th scope="col">DATA_POINT</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($projects as $project):?>
                <tr>
              <td><strong><?= $project['user_name']?></strong></td>
              <td><strong><?= $project['schedule_id'] . ":"?></strong></td>
              <td><strong><?= $project['project_id']?></strong></td>
              <td><?= $project['timeline']?></td>
              <td><?= $project['data_point']?></td>
              <td><?= $project['data_point']?></td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>