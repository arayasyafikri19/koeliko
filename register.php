<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #04003d;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #04003d;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ececec;
            color: #04003d;
        }
        #login-link {
            text-align: center;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="usaha">Usaha:</label>
            <input type="text" id="usaha" name="usaha" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Register">

            <label id="login-link">Already have an account? <a href="login.php">Login here</a></label>
        </form>
    </div>
    <?php
    include "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $usaha = $_POST["usaha"];
        $password = $_POST["password"];

        $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username'");

    
        if (mysqli_num_rows($cek) > 0) {
            echo "<p style='text-align: center;'>Username sudah digunakan! Silakan pilih username lain.</p>";
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO pengguna(username, usaha, password) VALUES('$username','$usaha','$password')");

            if ($query) {
                echo "<p style='text-align: center;'>Registrasi berhasil!<a href='login.php' style='color: #04003d; text-decoration: underline; text-align: center;'>Login di sini</a></p>";
            } else {
                echo "<p style='text-align: center;'>Registrasi gagal!</p>";
                session_destroy();
            }
            
        }
    }
    ?>
</body>
</html>