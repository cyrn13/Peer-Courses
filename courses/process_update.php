<?php

include "../db.php";

if(isset($_POST['update'])){

    $trainor_id = $_POST['trainor_id'];
    $title = $_POST['title'];
    $id = $_POST['id'];

    $stm = $pdo->prepare("UPDATE courses SET `trainor_id`=:ti, `title`=:t WHERE id=:id");
    $stm->execute([
        ':ti' => $trainor_id,
        ':t' => $title,
        ':id' => $id
    ]);
    header('location: ../courses/index.php');
}
?>