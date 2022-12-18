<?php
include($_SERVER["DOCUMENT_ROOT"] . '/products/create/post.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Додати продукт</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<?php include($_SERVER["DOCUMENT_ROOT"] . '/_header.php'); ?>

<h1 class="text-center">Додати продукт</h1>
<form class="col-md-6 offset-md-3" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Ціна</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <div class="container">
            <div class="row" id="list_images">
                <div class="col-md-3" id="selectImages">
                    <label for="image"
                           style="font-size: 120px; cursor:pointer;"
                           class="form-label text-success">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </label>
                    <input type="file" class="d-none" multiple id="image" >
                </div>
            </div>
        </div>

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Опис</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Додати</button>
</form>

<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.6.2.min.js"></script>
<script src="create.js"></script>
</body>
</html>
