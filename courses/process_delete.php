<?php

include "../db.php";

if(isset($_POST['delete'])){

    $ids = implode(",", $_POST['id']);
    $pdo->query("DELETE FROM courses WHERE id IN($ids)");
    
    header('location: ../courses/index.php');
}
?>