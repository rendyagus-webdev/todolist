<?php 
$conn = mysqli_connect("localhost","root","","to_do_list");

if (!$conn) {
    die("Konek Gagal : " . mysqli_connect_error());
};

?>