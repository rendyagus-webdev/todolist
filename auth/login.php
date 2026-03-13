<?php
session_start();
if(isset($_SESSION["login"])){
    header("Location: ../index.php");
    exit;
}
require "../config/functions.php";

if(isset($_POST["login"])){
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $rows = mysqli_fetch_assoc($result);
        if(password_verify($password,$rows["password"])){
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $rows["id"];
            $_SESSION["username"] = $_POST["username"];

            header("Location: ../index.php");
            exit;
        }
    }

    $error = true;
}

?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h1 class="login-title">Login</h1>

        <?php if(isset($error)) : ?>
            <p class="error-msg">Username atau Password salah!!!</p>
        <?php endif ?>

        <form action="" method="post" class="login-form">
            <div class="form-group">
                <label for="username">Nama</label>
                <input type="text" name="username" id="username" placeholder="Masukan Nama Anda" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password Anda" required>
            </div>

            <button type="submit" name="login" class="login-btn">
                Login
            </button>
        </form>
        <p class="register-text">Belum punya akun? <a href="register.php" class="register-link">register</a></p>
    </div>

</div>

</body>
</html>   