<?php

include "../db.php";

$id = $_GET['id'];

$stm = $pdo->prepare("SELECT * FROM trainors WHERE id=:id");
$stm->execute([':id'=>$id]);
$trainor = $stm->fetch();

$user = $pdo->query("SELECT * FROM users ORDER BY username, full_name")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Midterm Project</title>
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
                <a class="nav-item nav-link" href="../users/index.php">Users</a>
                <a class="nav-item nav-link active" href="../trainors/index.php">Trainors<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="../courses/index.php">Courses</a>
                <a class="nav-item nav-link" href="../trainees/index.php">Trainees</a>
            </div>
        </div>
    </div>
    </nav>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h3 style="text-align:center;">Update Trainor</h3>

                <form action="/trainors/process_update.php" method="post">
                    <input type="hidden" name="id" value="<?= $trainor->id ?>">
                    <div class="form-group">
                        <label for="user_id">Trainor</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="0">Select User</option>
                            <?php foreach($user as $t): ?>
                                <option value="<?= $t->id ?>" <?= $t->id==$trainor->user_id ? 'selected' : '' ?>><?= $t->username ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="specialty">Specialty</label>
                        <input type="text" name="specialty" id="specialty" value="<?= $trainor->specialty ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit" name="update">
                            Update Trainor
                        </button>
                        <a href="../trainors/index.php" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>