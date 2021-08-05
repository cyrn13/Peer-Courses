<?php

include "../db.php";

if(isset($_POST['update'])){

    $user_id = $_POST['user_id'];
    $specialty = $_POST['specialty'];
    $id = $_POST['id'];

    $stm = $pdo->prepare("UPDATE trainors SET `user_id`=:u, `specialty`=:s WHERE id=:id");
    $stm->execute([
        ':u' => $user_id,
        ':s' => $specialty,
        ':id' => $id
    ]);
    header('location: ../trainors/index.php');
}
?>