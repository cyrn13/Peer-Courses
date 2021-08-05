<?php

include "../db.php";

if(isset($_POST['delete'])){

    $ids = implode(",", $_POST['id']);
    $pdo->query("DELETE FROM trainors WHERE id IN($ids)");
    
    header('location: ../trainors/index.php');
}
?>