<!DOCTYPE html>
<?php
session_start();
// No need to sign in if we're signed in
if (isset($_SESSION['user_id'])) {
    header('Location: team07Welcome.php');
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])){
        $password = $_POST['password'];   
    }

    require 'accessDB.php';
    $db = getDB();

    $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute([':username' => $username]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $stmt->closeCursor();
    
    $checkPassword = password_verify($password, $user['password']);

    if ($checkPassword) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = $user;
        header('location: /team07Welcome.php');
        exit;
    }

    $msg = 'Password does not match.';
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <h1>Log in</h1>
  <?php if (isset($msg)) echo '<div>'.$msg.'</div>';?>
  <form action="team07Login.php" method="POST">
    <label for="username">Username: </label>
    <input type="text" value="<?php if (isset($username)) echo $username;?>" name="username" id="username" placeholder="User">
    <label for="password">Password: </label>
    <input type="text" value="" name="password" id="password" placeholder="Password">
    <input type="submit">
    <button type="reset">Reset</button>
    <a href="team07SignUp.php">Sign up</a>
  </form>
</body>

</html>