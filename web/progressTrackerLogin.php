<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracker</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="progressTracker.css">
  <script src="progressTracker.js"></script>

</head>

<body>
  <h1>Log in</h1>
  <video autoplay muted loop id="backgroundVideo">
    <source src="earthSunRotate.mp4" type="video/mp4">
  </video>
  <form action="progressTracker.php" method="POST">
    <label for="username">Username: (enter TEST_USER)</label>
    <input type="text" value="" name="username" id="username" placeholder="User">
    <label for="password">Password: (enter TEST_PASSWORD)</label>
    <input type="text" value="" name="password" id="password" placeholder="Password">
    <input type="submit">Submit</input>
    <button type="reset">Reset</button>
  </form>
</body>

</html>