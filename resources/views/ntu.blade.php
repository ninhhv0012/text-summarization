<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1  style="text-align: center">Hello, Thao Uyen Nguyen</h1>

    <video id="videoPlayer" width="1600" height="900" controls style="text-align: center">
        <source src="{{ asset('/backend/assets/video/ntu.mp4') }}" type="video/mp4">
    </video>

    <script>
        var video = document.getElementById('videoPlayer');

        video.addEventListener('ended', function() {
            // Store state information in session storage

            // Redirect to another route
            window.location.href = "{{ route('ntu') }}";
        });
    </script>
</body>

</html>
