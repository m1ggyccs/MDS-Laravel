<!-- resources/views/generate-qr-code.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Generate QR Code</h1>
        <form action="{{ route('generate.qr.code') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="data">Enter Data:</label>
                <input type="text" id="data" name="data" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate QR Code</button>
        </form>

        @if (session('qr_code'))
            <h2 class="mt-5">Your QR Code:</h2>
            <div>
                {!! session('qr_code') !!}
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
