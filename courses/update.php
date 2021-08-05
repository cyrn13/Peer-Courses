<?php

include "../db.php";

$id = $_GET['id'];

$stm = $pdo->prepare("SELECT * FROM courses WHERE id=:id");
$stm->execute([':id'=>$id]);
$course = $stm->fetch();

$user = $pdo->query("SELECT * FROM users ORDER BY username, full_name")->fetchAll();

$trainor = $pdo->query("SELECT * FROM trainors ORDER BY id, `user_id`")->fetchAll();

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
                <a class="nav-item nav-link" href="../trainors/index.php">Trainors</a>
                <a class="nav-item nav-link active" href="../courses/index.php">Courses<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="../trainees/index.php">Trainees</a>
            </div>
        </div>
    </div>
    </nav>

<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h3 style="text-align:center;">Update Course</h3>

                <form action="/courses/process_update.php" method="post">
                    <input type="hidden" name="id" value="<?= $course->id ?>">
                    <div class="form-group">
                        <label for="trainor_id">Trainor ID</label>
                        <select name="trainor_id" id="trainor_id" class="form-control">
                            <option value="0">Select Trainor</option>
                            <?php foreach($trainor as $t): ?>
                                <option value="<?= $t->id ?>" <?= $t->id==$course->trainor_id ? 'selected' : '' ?>><?= $t->user_id ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Course Title</label>
                        <select name="title" id="title" class="form-control">
                            <option value="<?= $course->title ?>"><?= $course->title ?></option>
                            <option value="Information Management 2">Information Management 2</option>
                            <option value="Integrative Programming Technology">Integrative Programming Technology</option>
                            <option value="Human Computer Interaction">Human Computer Interaction</option>
                            <option value="Networking 2">Networking 2</option>
                            <option value="Mobile Development">Mobile Development</option>
                            <option value="Web System & Technology">Web System & Technology</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit" name="update">
                            Update Course
                        </button>
                        <a href="../courses/index.php" class="btn btn-warning btn-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>