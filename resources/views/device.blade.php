<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Device</title>
</head>
<body>

<h1 style="text-align: center">Device</h1>

<form action="{{ route('device') }}" method="post">
    @csrf
    <label for="device">Device</label>
    <input type="text" name="device" id="device">
    <button type="submit">Submit</button>
</form>
</body>
</html>
