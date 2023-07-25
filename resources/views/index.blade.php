<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>General</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</head>
<body>
<form action="search_img" method="post">
    <div class="mt-3" style="width: 40%; margin-left: 20px">
        <label for="basic-url" class="form-label">Введите URL</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                   name="url">
            <button class="btn btn-outline-secondary" type="submit">Go</button>
        </div>
        <div class="form-text" id="basic-addon4">Скрипт считывает и выводит картинки и их размер</div>
    </div>
</form>
<br>
@if(!empty($args))
    <table class="table">
        <tbody>
        @foreach($args['src'] as $images)
            <tr>
                @foreach($images as $image)
                    <td><img src="{{$image}}" width="200"></td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <td><b>Количество изображений: {{$args['countImages']}}</b></td>
        </tr>
        <tr>
            <td><b>Объем изображений (МБ): {{$args['sizeImages']}}</b></td>
        </tr>
        </tbody>
    </table>
@endif
</body>
</html>