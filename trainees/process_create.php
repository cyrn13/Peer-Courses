<?php 

include "../db.php";

if(isset($_POST['create'])){

    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $status = $_POST['status'];
    
    $stm = $pdo->prepare("INSERT INTO trainees (id, `user_id`, `course_id`, `status`) VALUES (:id, :ui, :ci, :s)");
    $stm->execute([
        ':id' => $id,
        ':ui' => $user_id,
        ':ci' => $course_id,
        ':s' => $status 
    ]);

    header("location: /trainees/index.php");
}

?>