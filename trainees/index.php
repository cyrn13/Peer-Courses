<?php

include "../db.php";

$user = $pdo->query("SELECT * FROM users ORDER BY username, full_name")->fetchAll();

$trainor = $pdo->query("SELECT * FROM trainors ORDER BY `user_id`")->fetchAll();

$course = $pdo->query("SELECT * FROM courses ORDER BY id, `trainor_id`")->fetchAll();

//$trainees = $pdo->query("SELECT trainees.*, users.username AS 'user' 
            //FROM trainees LEFT JOIN users ON users.id=trainees.user_id
            //ORDER BY `user_id`")->fetchAll();

$trainees = $pdo->query("SELECT trainees.*, users.id AS 'user', courses.id AS 'course'FROM trainees 
            INNER JOIN users ON users.id=trainees.user_id 
            INNER JOIN courses ON courses.id=trainees.course_id
            ORDER BY `user`, course")->fetchAll();

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

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <br>

                <h2>Trainees Entry Form</h2>
                
                <br>

                    <form action="/trainees/process_create.php" method="post">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="0">Select Trainee</option>
                                <?php foreach($user as $t): ?>
                                    <option value="<?= $t->id ?>"><?= $t->username ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id">Course ID</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="0">Select Course ID</option>
                                <?php foreach($course as $c): ?>
                                    <option value="<?= $c->id ?>"><?= $c->id ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit" name="create">Add Trainees</button>
                        </div>
                    </form>

            </div>

            <div class="col-md-8">
            
                <br>

                <h4>List of Trainees</h4>

                <form action="/trainees/confirm_delete.php" method="post">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID Number</th>
                                <th>User ID</th>
                                <th>Course ID</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($trainees as $trainees): ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?= $trainees->id ?>"></td>
                                <td><a href="/trainees/update.php?id=<?= $trainees->id ?>"><?= $trainees->id ?></a></td>  
                                <td><?= $trainees->user_id ?></td>
                                <td><?= $trainees->course_id ?></td>
                                <td><?= $trainees->status ?></td>    
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