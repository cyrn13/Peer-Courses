<?php

include "../db.php";

if(isset($_POST['update'])){

    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $id = $_POST['id'];

    $stm = $pdo->prepare("UPDATE users SET `username`=:un, `full_name`=:fn WHERE id=:id");
    $stm->execute([
        ':un' => $username,
        ':fn' => $full_name,
        ':id' => $id
    ]);
    header('location: ../users/index.php');
}
?>