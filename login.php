<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h2><b>Login:</b></h2><br>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login"><br><br>
    </form>
    <a href="./register.php">Register</a>
    
    <?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "korisnici";

        // Kreirame konekcija
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // echo "Connected succesfully";

        $user = $_POST['username'];
        $user_password = $_POST['password'];

        $sql = "SELECT * FROM korisnik WHERE korisnicko_ime='$user'";
        $rezultat = mysqli_query($conn, $sql);

        if(mysqli_num_rows($rezultat) == 1) {

            $user_data = mysqli_fetch_assoc($rezultat);

            // Verifikacija na lozinka
            if(password_verify($user_password, $user_data['password'])) {

                $_SESSION['user'] = $user_data;
                header("Location: ./success.php");
                exit();

            } else {
                echo "<p>Incorrect password. Please try again.";
            }

        } else {
            echo "<p>User not found. Please register first</p>";
        }
        
        mysqli_close($conn);

    }
        
    ?>

</body>
</html>

