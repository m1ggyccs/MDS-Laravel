<!-- resources/views/qr/scan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.0.8/html5-qrcode.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Scan QR Code</h1>
        <div id="reader" width="600px"></div>
        <p id="result" class="mt-3"></p>
        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>

    <script>
        const html5QrCode = new Html5Qrcode("reader");

        const config = {
            fps: 10,
            qrbox: 250
        };

        html5QrCode.start({ facingMode: "environment" }, config, (decodedText, decodedResult) => {
            // Handle the result here
            document.getElementById("result").innerText = "Scanning: " + decodedText;

            // Redirect to show student info
            window.location.href = `{{ url('/students/show?data=') }}${decodedText}`;
        }).catch(err => {
            // Start failed, handle it
            console.error(err);
        });
    </script>
</body>
</html>
