<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.header')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable for {{ $section->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .timetable-table {
            margin: 20px auto;
            width: 90%;
            border-collapse: collapse;
        }
        .timetable-table th, .timetable-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
        }
        .timetable-table th {
            background-color: #f2f2f2;
            color: black;
        }
        .timetable-table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center my-4">Timetable for {{ $section->name }}</h2>
        <table class="table timetable-table">
            <thead>
                <tr>
                    <th>Time / Day</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timeSlots as $time)
                    <tr>
                        <td>{{ $time }}</td>
                        
                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                            <td>
                                @if(isset($schedule[$time][$day]))
                                    {{ $schedule[$time][$day]->section->name }}<br>
                                    {{ $schedule[$time][$day]->teacher->name }}<br>
                                    {{ $schedule[$time][$day]->class_name }}
                                @else
                                    -
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
