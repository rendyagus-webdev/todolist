<?php
session_start();

require"../config/functions.php";

$user_id = $_SESSION["user_id"];

$check = data("SELECT COUNT(*) FROM tasks WHERE status = 1 ")[0];
$belum = data("SELECT COUNT(*) FROM tasks WHERE status = 0")[0];


?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>statistik</title>
    </head>
    <body>
        <h1>Statistic Task</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Belum</th>
                    <th>Selesai</th>
                    <th>Total Tasks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($check as $selesai) : ?>
                    <?php foreach($belum as $belumm) : ?>
                        <?php $total = $selesai + $belumm ; ?>
                        
            <tr>
                <td><?= $belumm ?></td>
                <td><?= $selesai ?></td>
                <td><?=$total?></td>
            </tr>
                <?php endforeach ?>
            <?php endforeach ?>
        </tbody>
    </table>
    
</body>
</html>