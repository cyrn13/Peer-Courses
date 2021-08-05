<?php 

include "../db.php";

if(isset($_POST['create'])){
    
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $specialty = $_POST['specialty'];

    $stm = $pdo->prepare("INSERT INTO trainors (id, `user_id`, specialty) VALUES (:id, :u, :s)");
    $stm->execute([
        ':id' => $id,
        ':u' => $user_id,
        ':s' => $specialty
    ]);

    header("location: /trainors/index.php");
}

?>