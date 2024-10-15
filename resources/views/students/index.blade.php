@extends('students/layout')

@section('title', 'Students List')

@section('content')

    <div class="container">
        <h1 class="mb-4 text-center">Students List</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Year Level</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>QR Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="student-row"> <!-- Add class here for hover effect -->
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>{{ $student->year_level }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->section }}</td>
                            <td>{!! $qrCodes[$student->id] !!}</td> <!-- Display the generated QR code -->
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-light-blue">View</a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-light-yellow">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('students.create') }}" class="btn btn-light-green">Add New Student</a>
        </div>
    </div>
@endsection
