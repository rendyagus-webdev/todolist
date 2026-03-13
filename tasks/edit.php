<?php 
session_start();
require"../config/functions.php";

$id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$tasks = data("SELECT * FROM tasks WHERE id = '$id'")[0];

if(isset($_POST["ubah"])){
    if(ubah($_POST) > 0){
        echo "<script>alert('Data berhasil di update!!...');
        document.location.href = '../index.php'; </script>";
    }else{
        echo "<script>alert('Data gagal di update!!...' </script>";

    }
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <link rel="stylesheet" href="../assets/style1.css">
</head>

<body class="addtask-body">

<div class="addtask-container">
    <div class="addtask-card">
        <h2 class="addtask-title">Edit Task</h2>
        
        <form action="" method="post" class="addtask-form">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="user_id" value="<?= $user_id ?>">

            <div class="addtask-group">
                <label for="task">Task</label>
                <input 
                    type="text"
                    name="task"
                    id="task"
                    placeholder="Masukan Task Anda.."
                    required
                    value="<?= $tasks["tasks"] ?>"
                >
            </div>

            <div class="addtask-group">
                <label for="deadline">Deadline</label>
                <input
                    type="date"
                    name="deadline"
                    id="deadline"
                    required
                    value="<?= $tasks["deadline"] ?>"
                >
            </div>

            <button type="submit" name="ubah" class="addtask-btn">
                Update Task
            </button>

            <a href="../index.php" class="addtask-back">
                Kembali
            </a>
        </form>
    </div>
</div>

</body>
</html>