<!DOCTYPE html>
<html lang="en">    
<head>
<title>Item Browser</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="shoppingCart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="shoppingCart.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include "headNav03.php"?>
    <br>
    <form action="confirmationCheckout.php" method="POST">
        <div class="form-group">
            <label for="street">Street Address: </label>
            <input type="text" id="street" name="street" value="">
        </div>
        <div class="form-group">
            <label for="city">City: </label>
            <input type="text" id="city" name="city" value="">
        </div>
        <div class="form-group">
            <label for="state">State: </label>
            <input type="text" id="state" name="state" value="">
        </div>
        <div class="form-group">
            <label for="zipCode">ZipCode: </label>
            <input type="text" id="zipCode" name="zipCode" value="">
        </div>
        <button type="submit" class="btn bg-light">Confirm Purchase</button>
    </form>
    <?php include "footer.php"?>
</body>
</html>