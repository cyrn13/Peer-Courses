<?php

include "../db.php";

if(isset($_POST['delete'])){

    $ids = implode(",", $_POST['id']);
    $pdo->query("DELETE FROM users WHERE id IN($ids)");
    
    header('location: ../users/index.php');
}
?>