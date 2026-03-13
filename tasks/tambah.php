<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../auth/login.php");
    exit;
}

require"../config/functions.php";


if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0){
        echo "<script> alert('Data berhasil di tambahkan!!..');location.href ='../index.php';</script>";
    }else{
        echo "<script> alert('Data gagal di tambahkan!!..');location.href ='../index.php';</script>";
            
        echo mysqli_error($conn);
    }
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Task</title>

    <link rel="stylesheet" href="../assets/style1.css">
</head>
<body class="addtask-body">

<div class="addtask-container">
    <div class="addtask-card">
        <h2 class="addtask-title">Tambah Task</h2>
        <form action="" method="post" class="addtask-form">
            <div class="addtask-group">
                <label for="tasks">Task</label>
                <input type="text" id="tasks" name="tasks" placeholder="Masukan Task Anda.." required>
            </div>

            <div class="addtask-group">
                <label for="deadline">Deadline</label>
                <input type="date" id="deadline" name="deadline" required>
            </div>

            <button type="submit" name="tambah" class="addtask-btn">
                Tambah Task
            </button>

             <a href="../index.php" class="addtask-back">
                Kembali
            </a>

        </form>
    </div>
</div> 
</body>
</html>