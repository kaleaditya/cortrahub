<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Registering</title>
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="card p-5 mt-5 shadow-lg">
            <h1 class="mb-4 text-success">Thank You!</h1>
            <p class="lead">Your registration was successful.</p>
            <p>Please check your email for your password and further instructions.</p>
            <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to Home</a>
        </div>
    </div>
</body>
</html> 