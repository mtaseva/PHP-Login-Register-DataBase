<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();

}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continue</title>
</head>
<body>
    <p>Welcome back <?php echo $user['ime']; ?>.<br>
    Your full name is <?php echo $user['ime']. ' ' . $user['prezime']; ?>.<br>
    Your username is '<?php echo $user['korisnicko_ime']; ?>'.</p>
</body>
</html>