<?php
require 'handler.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <title>Student list</title>
</head>
<body>
<div class="row">
    <div class="col-6">
        <table class="table table-bordered border-dark table-hover m-2">
            <thead>
            <tr>
                <?php foreach ($allLessons as $lesson): ?>
                    <th><?= $lesson ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $studentName => $studentLessons): ?>
                <tr>
                    <td><?= $studentName ?></td>
                    <?php foreach ($studentLessons as $studentGrade): ?>
                        <td><?= $studentGrade ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

