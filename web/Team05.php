<?php
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

foreach ($db->query('SELECT * FROM scriptures') as $row)
{
  $scriptures[] = $row;
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scripture List</title>
  
</head>
<body>
    <table>
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