<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.header')
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        /* Admin view styling */
        .admin-container {
            margin: 30px auto;
            max-width: 1200px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-container h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .absence-table {
            width: 100%;
            border-collapse: collapse;
        }

        .absence-table th, .absence-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .absence-table th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        .absence-table td {
            background-color: #fff;
        }

        .absence-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .absence-table tr:hover {
            background-color: #ddd;
        }

        .filter-form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .filter-form label {
            margin-bottom: 5px;
        }

        .filter-form select, .filter-form input {
            padding: 10px;
            margin-bottom: 10px;
        }

        .filter-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Student Absences</h1>


        <!-- Filter Form -->
        <form class="filter-form" action="{{ route('admin.absences.filter') }}" method="post">
            @csrf

            <label for="section">Filter by Section:</label>
            <select id="section" name="section">
                <option value="">All Sections</option>
                @foreach($sections as $section)
                <option value="{{ $section->id }}" {{ request('section') == $section->id ? 'selected' : '' }}>
                    {{ $section->name }}
                </option>
                @endforeach
            </select>

            <label for="date">Filter by Date:</label>
            <input type="date" id="date" name="date" value="{{ request('date') }}">

            <button type="submit">Filter</button>
        </form>

        <!-- Absence List -->
        <table class="absence-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Section</th>
                    <th>Student</th>
                    <th>Time Slot</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absences as $absence)
                <tr>
                    <td>{{ $absence->day }}</td>
                    <td>{{ $absence->section->name }}</td>
                    <td>{{ $absence->student->full_name }}</td>
                    <td>{{ $absence->timeslot->time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
