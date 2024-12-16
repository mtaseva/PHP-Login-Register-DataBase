<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>

    <h2><b>Registration</b></h2><br>

    <form action="./register.php" method="post">

        First Name: <input type="text" name="first_name" required><br>
        Surname: <input type="text" name="surname" required><br>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="register" value="Register"> 

    </form>

    <?php

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {

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

        $first_name = $_POST['first_name'];
        $surname = $_POST['surname'];
        $user = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, password) VALUES ('$first_name', '$surname', '$user', '$pass')";

        if(mysqli_query($conn, $sql)) {
            echo "<p>Registration successful! <a href='./login.php'>Login here</a></p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    
    }

    ?>

</body>
</html>