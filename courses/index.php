<?php

include "../db.php";

$user = $pdo->query("SELECT * FROM users ORDER BY username, full_name")->fetchAll();

$trainor = $pdo->query("SELECT * FROM trainors ORDER BY `user_id`")->fetchAll();

$courses = $pdo->query("SELECT courses.*, trainors.user_id AS 'trainor' 
            FROM courses LEFT JOIN trainors ON trainors.id=courses.trainor_id
            ORDER BY id, `trainor_id`")->fetchAll();
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
                <a class="nav-item nav-link active" href="../courses/index.php">Courses<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="../trainees/index.php">Trainees</a>
            </div>
        </div>
    </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-md-4">

                <br>

                <h2>Course Entry Form</h2>
                
                <br>

                    <form action="/courses/process_create.php" method="post">
                        <div class="form-group">
                            <label for="trainor_id">Trainor</label>
                            <select name="trainor_id" id="trainor_id" class="form-control">
                                <option value="0">Select Trainor</option>
                                <?php foreach($trainor as $t): ?>
                                    <option value="<?= $t->id ?>"><?= $t->user_id ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Course Title</label>
                            <select name="title" id="title" class="form-control">
                                <option value="0">Select Course</option>
                                <option value="Information Management 2">Information Management 2</option>
                                <option value="Integrative Programming Technology">Integrative Programming Technology</option>
                                <option value="Human Computer Interaction">Human Computer Interaction</option>
                                <option value="Networking 2">Networking 2</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="Web System & Technology">Web System & Technology</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit" name="create">Add Course</button>
                        </div>
                    </form>

            </div>

            
            <div class="col-md-8">

                <br>

                <h4>List of Courses</h4>

                <form action="/courses/confirm_delete.php" method="post">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID Number</th>
                                <th>Trainor ID</th>
                                <th>Course Title</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($courses as $c): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?= $c->id ?>"></td>
                                <td><?= $c->id?></td>
                                <td><a href="/courses/update.php?id=<?= $c->id ?>"><?= $c->trainor_id ?></a></td>
                                <td><?= $c->title ?></td>    
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button class="btn btn-danger btn-sm" type="submit" name="delete">
                        Delete Selected
                    </button>
                </form>    
              
            </div>
        </div>

    </div>

</body>
</html>