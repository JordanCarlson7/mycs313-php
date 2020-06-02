<?php
session_start();
// Sign up if we're not signed in
if (!isset($_SESSION['user_id'])) {
    header('Location: team07SignUp.php');
    die();
}

$user_id = $_SESSION['user_id'];
$username = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - TeamTime Week07</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1>Welcome to Week 7's assignment</h1>
<h3 id="welcome_user">Your User name is: <?= $_SESSION['user']['username'] ?>!</h3>

</body>
</html>