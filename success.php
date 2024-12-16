<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: ./login.php");
    exit();

}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<body>
    <p>Hi <?php echo $user['ime']; ?>, you are now logged in as <?php echo $user['ime'] . ' ' . $user['prezime']; ?></p>
    <a href="./continue.php">Click here to continue</a>
</body>
</html>