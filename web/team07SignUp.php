<?php
session_start();
// No need to sign up if we're signed in
if (isset($_SESSION['user_id'])) {
    header('Location: team07Welcome.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - Teach07</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="team07_signup.js"></script>
</head>
<body>
<h1>Sign up</h1>
<p id='signup_message'></p>
<form onsubmit="return verify_signup('username', 'password', 'verfy_password', 'signup_message')">
    <label for="username">Username: </label><input type="text" id="username" required><br/><br/>
    <label for="password">Password: </label><input type="text" id="password" required><br/><br/>
    <label for="verify_password">Verify Password: </label><input type="text" id="verify_password" required><br/>
    <button type="submit">Submit</button>
</form>
</body>
</html>
