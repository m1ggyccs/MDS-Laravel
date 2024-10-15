<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student Laravel 9 CRUD application">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'M1G')</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- For icons -->
    
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            margin: 0; /* Remove default margin */
        }
        .navbar {
            margin-bottom: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
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
        footer {
            margin-top: 20px;
            text-align: center;
            color: #6c757d; /* Muted color for footer */
        }
        .sidebar {
            background-color: #FFF4B5; /* Light yellow for sidebar */
            color: #343a40; /* Dark text color for contrast */
            height: 100vh; /* Full height of the viewport */
            position: fixed; /* Fixed position */
            top: 0; /* Align to the top */
            left: 0; /* Align to the left */
            width: 250px; /* Set width for sidebar */
            padding-top: 20px;
            z-index: 1000; /* Ensure it stays above other content */
        }
        .sidebar .company-name {
            text-align: center; /* Centered text */
            font-size: 24px; /* Larger font size */
            font-weight: bold; /* Bold font */
            margin-bottom: 30px; /* Space below company name */
            color: black; /* Primary color for company name */
        }
        .sidebar a {
            color: #343a40; /* Dark text color */
            text-decoration: none;
            text-align: center; /* Center text in links */
            padding: 10px; /* Padding for links */
            border-radius: 5px; /* Rounded corners for buttons */
        }
        .sidebar a:hover {
            background-color: #e6c16b; /* Darker shade for hover effect */
            color: white; /* Change text color on hover */
        }
        .main-content {
            margin-left: 250px; /* Space for sidebar */
            padding: 100px; /* Padding for content */
        }

                /* Hover effect for table rows */
        table.table tbody tr:hover {
            transition: background-color 0.3s, box-shadow 0.3s;
            background-color: #e2e3e5; /* Change this to your preferred hover color */
        }

        .table tbody tr:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background-color: #e7f1ff; /* Optional: change background color on hover */
        }

        /* Button hover effects */
        .btn-light-blue:hover {
            background-color: #add8e6 !important; /* Keep the same color or change it slightly */
            color: #0056b3; /* Darker text color on hover */
        }

        .btn-light-yellow:hover {
            background-color: #ffffb3 !important; /* Change to a slightly darker shade */
            color: #856404; /* Darker text color on hover */
        }

        .btn-danger:hover {
            background-color: #dc3545; /* Darken the red color */
            color: white; /* Keep text white */
        }

        .btn-light-green:hover {
            background-color: #76c7a1 !important; /* Slightly darker green on hover */
            color: black; /* Text color */
        }

            

        /* Responsive Design */
        @media (max-width: 992px) { /* For tablets and smaller devices */
            .sidebar {
                width: 200px; /* Reduce sidebar width */
                
            }
            .main-content {
                margin-left: 200px; /* Adjust content margin */
                padding: 50px; /* Reduce padding for smaller screens */
            }
        }

        @media (max-width: 768px) { /* For tablets and mobile devices */
            .sidebar {
                width: 100%; /* Sidebar takes full width */
                height: auto; /* Adjust height */
                position: relative; /* Change position for stacking */
                padding: 10px; /* Reduce padding */
            }
            .sidebar a {
                display: block; /* Stack links vertically */
                padding: 8px 15px; /* Adjust padding */
            }
            .main-content {
                margin-left: 0; /* Remove margin */
                height: auto; /* Adjust height */
                position: relative; /* Change position for stacking */
                padding: 20px; /* Further reduce padding for mobile */
            }
        }

        @media (max-width: 576px) { /* For smaller mobile devices */
            .main-content {
                padding: 10px; /* Minimal padding on smaller screens */
                height: auto; /* Adjust height */
                position: relative; /* Change position for stacking */
            }
            .sidebar .company-name {
                font-size: 20px; /* Smaller font size */
                margin-bottom: 15px; /* Reduce margin */
            }
        }
    </style>
</head>
<body>

    <div class="d-flex flex-column flex-md-row">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="company-name">
                M1G <!-- Place for your company name -->
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="nav-link active" href="{{ route('students.index') }}">
                        <i class="fas fa-home"></i> Student List
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('students.create') }}">
                        <i class="fas fa-plus-circle"></i> Add a New Student
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content"> <!-- Main content area -->
            @yield('content') <!-- This is where child views will inject their content -->
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">© {{ date('Y') }} M1G. All Rights Reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kaUJrWa2jvAOyMLhT+1NRpdwFPI+3wW1jcRxD4U/ZOOKeKpEgvJm9VR9g6pGN0cA" crossorigin="anonymous"></script>
</body>
</html>
