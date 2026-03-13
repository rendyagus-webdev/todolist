<?php 
require"../config/functions.php";

if(isset($_POST["register"])){
    if(register($_POST) > 0){
        echo "<script>
                alert('Berhasil Registrasi!!..');
                location.href = 'login.php' ;
             </script>";
    }else {
        echo mysqli_error($conn);
    }
};

?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h1 class="login-title">Register</h1>

        <form action="" method="post" class="login-form">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama Anda" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password Anda" required>
            </div>
            
            <div class="form-group">
                <label for="password2">Verifikasi Password</label>
                <input type="password2" name="password2" id="password2" placeholder="Verifikasi Password Anda" required>
            </div>

            <button type="submit" name="register" class="login-btn">
                Login
            </button>
        </form>
        <p class="register-text">Sudah punya akun? <a href="login.php" class="register-link">Login</a></p>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="../script.js"></script>
</body>
</html>   