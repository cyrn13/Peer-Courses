<?php

include "../db.php";

if(isset($_POST['create'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];

    $stm = $pdo->prepare("INSERT INTO users (id, `username`, `full_name`) VALUES (:id, :un, :fn)");
    $stm->execute([
        ':id' => $id,
        ':un' => $username,
        ':fn' => $full_name
    ]);
    header('location: ../users/index.php');
}
?>