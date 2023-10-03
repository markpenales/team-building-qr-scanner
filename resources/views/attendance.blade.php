<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Download Jquery --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>

<body>
    @if (session()->has('Attendance recorded'))
        <script>
            alert({{ session()->get('Attendance recorded') }})
        </script>
    @endif

    <div class="row" id="qr">
        <a href="/" class="btn btn-primary" style="font-size: 150px;">Home</a>
        <video id="qr-video" class="col-sm-12"></video>
        <input type="hidden" id="time" value="{{ $time }}">
    </div>

    <div id="app"></div>
</body>


<script type="module">
    const video = document.getElementById('qr-video');

    const qr = document.getElementById('qr');
    const confirmBtn = document.getElementById('confirm-btn');
    const time = document.getElementById('time');

    $.process = function(result) {

        $.ajax({
            type: 'get',
            url: `/attendance/${time.value}/${result.data}`,
            success: function(response) {
                if (response == "Create Student") {
                    window.location.replace(location.protocol + '/  /' + location.host +
                        `/create?time=${time.value}m&code=` + result.data);
                    return;
                }
                alert(response);
            },
            fail: function(err) {
                alert(err);
            }

        })

    }
    $(document).ready(function() {});

    const scanner = new QrScanner(video, result => $.process(result), {
        highlightScanRegion: true,
        highlightCodeOutline: true,
        maxScansPerSecond: 1,
    });

    scanner.start();
</script>

</html>
