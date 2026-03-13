<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

require"conn.php";

function data($query){
    global $conn;

    $result = mysqli_query($conn,$query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data){
    global $conn;

    $tasks = htmlspecialchars($data["tasks"]);
    $user_id = $_SESSION["user_id"];
    $deadline = htmlspecialchars($data["deadline"]);

    $query = "INSERT INTO tasks VALUES ('','$user_id','$tasks','','$deadline')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM tasks WHERE id ='$id'");

    return mysqli_affected_rows($conn);
}

function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["nama"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    if($password !== $password2){
        echo "<script> alert('Konfirmasi Password Salah');</script>";

        return false;
    }
    
    $result = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('Username Sudah Terdaftar');</script>";
        return false;

    }

    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $user_id = $data["user_id"];
    $tasks = htmlspecialchars($data["task"]);
    $deadline = htmlspecialchars($data["deadline"]);

$query = "UPDATE tasks SET
            user_id = '$user_id',
            tasks = '$tasks',
            deadline = '$deadline'
          WHERE id = '$id'";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

?>