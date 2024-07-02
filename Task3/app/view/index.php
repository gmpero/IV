<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-4 m-2">
            <form action="index.php" method="post">
                <div class="form-group mb-3">
                    <label for="username">Имя</label>
                    <input name="username" type="text" class="form-control" id="username">
                </div>
                <div class="form-group mb-3">
                    <label for="message">Комментарий</label>
                    <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                    <input type="hidden" name="token" value="<?= $token->getToken() ?>">
                </div>
                <div class="form-group">
                    <input type="submit" value="Отправить" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <!--  Проверка подключения-->
    <!--  единый файл стартовая точка-->
    <!--  вынести в контроллеры-->
    <div class="row">
        <div class="col-6">
            <h3>Комментарии</h3>
            <?php foreach ($comments as $comment): ?>
                <div class="card-comment mb-2">
                    <div class="comment-text">
                        <div>
                            <span class="text-info"> <?= $comment['username'] ?></span>
                        </div>
                        <?= $comment['message'] ?>
                    </div>
                    <!-- /.comment-text -->
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
</body>
</html>

