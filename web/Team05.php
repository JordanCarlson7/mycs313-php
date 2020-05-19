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
  $stmt = $db->prepare('SELECT * FROM scriptures');
} else {
  $stmt = $db->prepare('SELECT * FROM scriptures WHERE book = :searchTerm');
}

$stmt->bindValue(':searchTerm', $searchTerm, PDO::PARAM_INT);

$stmt->execute();

$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->closeCursor();
dd('here');
/*$stmt = $db->prepare("SELECT * FROM scriptures WHERE book LIKE '$searchTerm'");


  foreach ($scriptures as $row)
  {
    $scriptures[] = $row;
  }
} else {
  foreach($db->query("SELECT * FROM scriptures WHERE book LIKE :") as $row) {
    $scripture[] = $row;
  }
} */
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
    <form action="Team05.php" method="GET">
    <input type="text" name="search">
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

</body>
</html>