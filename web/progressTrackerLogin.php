<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="progressTracker.css">
  <script src="progressTracker.js"></script>
  
</head>
<body>
    <h1>Log in</h1>
    <form action="progressTracker.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" value="" placeholder="User">
    <label for="password">Password:</label>
    <input type="text" value="" placeholder="Password">
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
    </form>
</body>
</html>