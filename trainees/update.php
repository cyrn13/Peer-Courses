<?php

include "../db.php";

$id = $_GET['id'];

$stm = $pdo->prepare("SELECT * FROM trainees WHERE id=:id");
$stm->execute([':id'=>$id]);
$trainees = $stm->fetch();

$user = $pdo->query("SELECT * FROM users ORDER BY username, full_name")->fetchAll();

$course = $pdo->query("SELECT * FROM courses ORDER BY id")->fetchAll();

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
                <a class="nav-item nav-link" href="../users/index.php">Users</a>
                <a class="nav-item nav-link" href="../trainors/index.php">Trainors</a>
                <a class="nav-item nav-link" href="../courses/index.php">Courses</a>
                <a class="nav-item nav-link active" href="../trainees/index.php">Trainees<span class="sr-only">(current)</span></a>
            </div>
        </div>
    </div>
    </nav>

<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h3 style="text-align:center;">Update Trainees</h3>

                <form action="/trainees/process_update.php" method="post">
                    <input type="hidden" name="id" value="<?= $trainees->id ?>">
                    <div class="form-group">
                        <label for="user_id">Username - ID</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="0">Select User ID</option>
                            <?php foreach($user as $u): ?>
                                <option value="<?= $u->id ?>" <?= $u->id==$trainees->user_id ? 'selected' : '' ?>><?= $u->username ?> - <?= $u->id ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="course_id">Course ID</label>
                        <select name="course_id" id="course_id" class="form-control">
                            <option value="0">Select Course ID</option>
                            <?php foreach($course as $c): ?>
                                <option value="<?= $c->id ?>" <?= $c->id==$trainees->course_id ? 'selected' : '' ?>><?= $c->id ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" value="<?= $trainees->status ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit" name="update">
                            Update Course
                        </button>
                        <a href="../trainees/index.php" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
</html>