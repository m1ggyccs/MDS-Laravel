@extends('students/layout')

@section('title', 'Create Student')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-light-blue {
            background-color: #add8e6 !important; /* Light blue */
            color: black !important; /* Text color */
        }
        .btn-light-yellow {
            background-color: #ffffe0 !important; /* Light yellow */
            color: black !important; /* Text color */
        }
        .btn-light-green {
            background-color: #90ee90 !important; /* Light green */
            color: black !important; /* Text color */
        }
        .form-control {
            border-radius: 0.5rem; /* Rounded corners for inputs */
        }
        h1 {
            color: black; /* Dark purple for heading */
        }
        .form-group {
            margin-bottom: 1.5rem; /* Space between form groups */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Create New Student</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="First Name, Last Name" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Street Address, City, Region, Zip Code" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="mobile">Mobile:</label>
                    <input type="text" id="mobile" name="mobile" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="year_level">Year Level:</label>
                    <input type="text" id="year_level" name="year_level" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="course">Course:</label>
                    <input type="text" id="course" name="course" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="section">Section:</label>
                    <input type="text" id="section" name="section" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between flex-wrap">
                <button type="submit" class="btn btn-light-green flex-grow-1 mr-1">Create Student</button>
                <a href="{{ route('students.index') }}" class="btn btn-light-yellow flex-grow-1">Back to List</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
