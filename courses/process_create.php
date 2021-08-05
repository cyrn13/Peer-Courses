<?php 

include "../db.php";

if(isset($_POST['create'])){

    $id = $_POST['id'];
    $trainor_id = $_POST['trainor_id'];
    $title = $_POST['title'];
    
    $stm = $pdo->prepare("INSERT INTO courses (id, `trainor_id`, `title`) VALUES (:id, :tr, :ti)");
    $stm->execute([
        ':id' => $id,
        ':tr' => $trainor_id,
        ':ti' => $title 
    ]);

    header("location: /courses/index.php");
}

?>