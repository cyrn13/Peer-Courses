<?php

include "../db.php";

if(isset($_POST['delete']) && count($_POST['id']) > 0){
    
    $ids = implode(",", $_POST['id']);

    $stm = $pdo->query("SELECT * FROM users WHERE id IN ($ids)");
    $data = $stm->fetchAll();
}else{
    header('location: ../users/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Midterm Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">Simple Inventory</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="/index.php">Home</a>
                <a class="nav-item nav-link active" href="../users/index.php">Users <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="../trainors/index.php">Trainors</a>
                <a class="nav-item nav-link" href="../courses/index.php">Courses</a>
                <a class="nav-item nav-link" href="../trainees/index.php">Trainees</a>
            </div>
        </div>
    </div>
    </nav>

<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h2>Delete Confirmation!</h2>
                    </div>
                    <div class="card-body">
                        <h4>Are you sure you want to delete this user?</h4>
                        <form action="/users/process_delete.php" method="post">
                        <ul>
                            <?php foreach($data as $u): ?>
                                <li><?= $u->username ?></li>
                                <input type="hidden" name="id[]" value="<?= $u->id ?>">
                            <?php endforeach; ?>
                        </ul>

                        <button class="btn btn-danger btn-sm" type="submit" name="delete">
                            Yes - Delete User
                        </button>
                        <a href="../users/index.php" class="btn btn-info btn-sm">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>