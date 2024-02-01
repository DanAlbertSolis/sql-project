<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="container">
        <form action="includes/login.inc.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email...">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password...">
            </div>
            <div class="form-group">
                <input type="submit" value="Login" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
