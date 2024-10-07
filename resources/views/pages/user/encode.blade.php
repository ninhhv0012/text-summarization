<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt</title>
    @include('layout.source')
</head>

<body>
    <div class="text-center" style="background: #9696cc">
        <h1>Encryption Form</h1>
        <form method="post" action="{{ route('password') }}" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf
            <label for="password">Password:</label>
            <input type="text" name="password" id="password"><br><br>
            <label for="key">Encryption key:</label>
            <select name="key" id="key">
                <option value="1">Key 1</option>
                <option value="2">Key 2</option>
                <option value="3">Key 3</option>
                <option value="4">Key 4</option>
                <option value="5">Key 5</option>
            </select><br><br>
            <input type="submit" name="type" value="Encrypt">
            <input type="submit" name="type" value="Decrypt">
        </form>
        @if (isset($encode_password))
            <h2>Result</h2>
            <p class="btn-primary">Password: {{ $password }}</p>
            <p>Key: {{ $key }}</p>
            <p class="btn-danger ">Encoded password: {{ $encode_password }}</p>
        @elseif (isset($decode_password))
            <h2>Result</h2>
            <p class="btn-primary">Password: {{ $password }}</p>
            <p>Key: {{ $key }}</p>
            <p class="btn-danger ">Decoded password: {{ $decode_password }}</p>
        @endif
    </div>

</body>

</html>
