@extends('students/layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $student->name }} Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
            color: #4b0082; /* Dark purple for heading */
        }
        .list-group-item {
            border: none; /* Remove border for a cleaner look */
            background-color: #f8f9fa; /* Light background for items */
        }
        .list-group-item strong {
            color: #333; /* Dark text for labels */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">{{ $student->name }}'s Details</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Name:</strong> {{ $student->name }}</li>
            <li class="list-group-item"><strong>Age:</strong> {{ $student->age }}</li>
            <li class="list-group-item"><strong>Gender:</strong> {{ $student->gender }}</li>
            <li class="list-group-item"><strong>Address:</strong> {{ $student->address }}</li>
            <li class="list-group-item"><strong>Mobile:</strong> {{ $student->mobile }}</li>
            <li class="list-group-item"><strong>Year Level:</strong> {{ $student->year_level }}</li>
            <li class="list-group-item"><strong>Course:</strong> {{ $student->course }}</li>
            <li class="list-group-item"><strong>Section:</strong> {{ $student->section }}</li>
            <li class="list-group-item"><strong>QR Code:</strong> {!! $qrCode !!}</li>
        </ul>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-light-blue">Edit</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('students.index') }}" class="btn btn-light-yellow">Back to List</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
