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
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">

            <label id="login-link">Don't have an account? <a href="register.php">Register here</a></label>
        </form>
    </div>
    <?php
    session_start();
    include "koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usaha = $_POST['usaha'];
        $query = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$username' AND password='$password'");

        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $data['username'];
            $_SESSION['usaha'] = $data['usaha'];
            header("Location: dashboard.php");
            exit();
        }else{
            echo "Username atau Password Salah";
        }
    }
    ?>
</body>
</html>