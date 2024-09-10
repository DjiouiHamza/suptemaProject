<!DOCTYPE html>
<html lang="en">
<head>
    <title>Students List in {{$sections->name}}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Pagination styling */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination {
            margin: 0;
        }

        .btn-back {
            background-color: #28a745;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #218838;
        }

        /* Other styles remain unchanged */
        .section-container {
            margin: 30px auto;
            max-width: 1200px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .section-container h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
        }

        .students-table th, .students-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .students-table th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        .students-table td {
            background-color: #fff;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="section-container">
        <h1>{{ $sections->name }}</h1>

        <div class="grid-container">
            <!-- Left Column -->
            <div class="table-container">
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students->forPage(1, 10) as $student) <!-- First 10 students -->
                        <tr>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->age }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Right Column -->
            <div class="table-container">
                <table class="students-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students->forPage(2, 10) as $student) <!-- Next 10 students -->
                        <tr>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->age }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination and Return Button -->
        <div class="pagination-container">
            <div class="pagination">
                {{ $students->links('vendor.pagination.simple-tailwind') }}
            </div>
        </div>
    </div>
</body>
</html>
