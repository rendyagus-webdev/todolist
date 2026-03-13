<?php 
require"../config/functions.php";

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
if(isset($_POST['id']) && isset($_POST['status'])){

    $id = $_POST["id"];
    $status = $_POST['status'];
    $user_id = $_SESSION['user_id'];
    
    mysqli_query($conn,
    "UPDATE tasks SET status='$status' 
    WHERE id='$id' AND user_id='$user_id'");
    
    echo"success";
}

// // Reset semua task user ke belum selesai
// mysqli_query($conn, "UPDATE tasks SET status=0 WHERE user_id='$user_id'");

// // Tandai task yang dicentang sebagai selesai
// if(isset($_POST['done'])){
//     foreach($_POST['done'] as $id){
//         mysqli_query($conn, "UPDATE tasks SET status=1 WHERE id='$id' AND user_id='$user_id'");
//     }
// }
// // var_dump($_POST["done"]);die;

// header("Location: ../index.php");
// exit;
// 
?>
