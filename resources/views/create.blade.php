<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form method="POST" class="form-group row">
        <a href="attendance/{{ request()->get('time') }}" class="btn btn-primary py-2 px-5 fs-1">Back</a>
        @csrf
        <h1>Create User</h1>
        <input type="text" class="form-control mx-2 p-4 mb-3" placeholder="First Name" name="first_name" required>
        <input type="text" class="form-control mx-2 p-4 mb-3" placeholder="Middle Initial" name="middle_initial"
            maxlength="2">
        <input type="text" class="form-control mx-2 p-4 mb-3" placeholder="Last Name" name="last_name" required>
        <input type="text" class="form-control mx-2 p-4 mb-3" placeholder="Extension" name="extension">
        <input type="hidden" name="code" value="{{ request()->get('code') }}">
        <input type="hidden" name="time" value="{{ request()->get('time') }}">
        <div class="d-flex justify-content-start">
            <input type="submit" value="Submit" class="btn btn-primary py-2 px-5">
        </div>
    </form>
</body>

</html>
