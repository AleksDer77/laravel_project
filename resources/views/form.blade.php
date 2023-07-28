<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<form class="border p-3 bg-light" method="post" action="{{ route('form.form') }}" style="max-width: 400px; margin: 0 auto;">

    @csrf

    <div class="mb-3">
        <label class="form-label">Название</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Описание</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">фото</label>
        <input type="text" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Калории</label>
        <input type="number" name="calories" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Цена</label>
        <input type="number" name="cost" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>

</form>
</body>
</html>
