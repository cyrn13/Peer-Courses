<?php

include "../db.php";

if(isset($_POST['update'])){

    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $stm = $pdo->prepare("UPDATE trainees SET `user_id`=:ui, `course_id`=:ci, `status`=:s WHERE id=:id");
    $stm->execute([
        ':ui' => $user_id,
        ':ci' => $course_id,
        ':s' => $status,
        ':id' => $id
    ]);
    header('location: ../trainees/index.php');
}
?>