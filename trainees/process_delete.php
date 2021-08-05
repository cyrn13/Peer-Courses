<?php

include "../db.php";

if(isset($_POST['delete'])){

    $ids = implode(",", $_POST['id']);
    $pdo->query("DELETE FROM trainees WHERE id IN($ids)");
    
    header('location: ../trainees/index.php');
}
?>