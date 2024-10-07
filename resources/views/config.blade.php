<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Config</title>
</head>
<body>

<h1 style="text-align: center">Config</h1>

<form action="{{ route('config') }}" method="post">
    @csrf
    <label for="video">Url</label>
    <input type="text" name="url" id="video">
    <button type="submit">Submit</button>
</form>
</body>
</html>
