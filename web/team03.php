<?php
$majors = [
  'cs' => 'Computer Science',
  'wdd' => 'Web Design and Development',
  'cit' => 'Computer Information Technology',
  'ce' => 'Computer Engineering'
];

$countries = [
  'NA' => 'North America',
  'SA' => 'South America',
  'EU' => 'Europe',
  'AS' => 'Asia'
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teach03</title>
</head>
<body>
    <form action="php_script.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" name="name"><br>
        
        <label for="email">Email: </label>
        <input type="text" name="email"><br>
        
        <label for="major">Major:</label><br>
        <input type="radio" id="cs"  name="major" value="Computer Science"> Computer Science<br>
        <input type="radio" id="wdd" name="major" value="Web Design and Development">Web Design and Development<br>
        <input type="radio" id="cit" name="major" value="Computer Information Technology">Computer Information Technology<br>
        <input type="radio" id="ce"  name="major" value="Computer Engineering">Computer Engineering<br>
        
        <label for="comments">Comments:</label><br> 
        <textarea name="comments"></textarea> <br>
        
        Visited Countries:<br>
        <input type="checkbox" name="visited" value="North America"> <label for="North America">North America</label><br>
        <input type="checkbox" name="visited" value="South America"> <label for="South America">South America</label><br>
        <input type="checkbox" name="visited" value="Europe"> <label for="Europe">Europe</label><br>
        <input type="checkbox" name="visited" value="Asia"> <label for="Asia">Asia</label><br>
        <input type="checkbox" name="visited" value="Australia"> <label for="Australia">Australia</label><br>
        <input type="checkbox" name="visited" value="Africa"> <label for="Africa">Africa</label><br>
        <input type="checkbox" name="visited" value="Antarctica"> <label for="Antarctica">Antarctica</label><br>
        <input type="submit" value="Send Details">
    </form>
</body>
</html>