<?php
$searchTerm = filter_var(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

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


$scriptures = [];

if (empty($searchTerm)) {
  foreach ($db->query('SELECT * FROM scriptures') as $row)
  {
    $scriptures[] = $row;
  }
} else {
  foreach($db->query("SELECT * FROM scriptures WHERE book LIKE {$searchTerm}") as $row) {
    $scripture[] = $row;
  }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scripture List</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
</head>
<body>
    <h1>Scripture Resources</h1>
    <form action="index.php" method="POST">
    <input type="submit">
    <button type="submit">Submit</button>
    </form>
    
    
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">Book</th>
            <th scope="col">Chapter</th>
            <th scope="col">Verse</th>
            <th scope="col">Content</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($scriptures as $scripture):?>
                <tr>
              <td><strong><?= $scripture['book']?></strong></td>
              <td><strong><?= $scripture['chapter'] . ":"?></strong></td>
              <td><strong><?= $scripture['verse']?></strong></td>
              <td><?= $scripture['content']?></td>
            </tr> 
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <!-- 	    echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>"; -->

    
<!-- foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
} -->

</body>
</html>