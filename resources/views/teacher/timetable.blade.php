<!DOCTYPE html>
@include('layouts.header')

<html lang="en">
<head>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
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
        .clickable-class {
            cursor: pointer;
            color: #007bff;
            text-decoration: none;
        }
        .clickable-class:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center my-4">Timetable for {{ Auth::user()->name }}</h2>
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
                        <td>
                            @if (isset($schedule[$time]['Monday']))
                                <a href="{{ route('class_absence', [
    $schedule[$time]['Monday']->section->id,
    $schedule[$time]['Monday']->day,
    $schedule[$time]['Monday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Monday']->section->name }}<br>
                                    {{ $schedule[$time]['Monday']->class_name}} 
                                
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (isset($schedule[$time]['Tuesday']))
                                <a href="{{ route('class_absence', [
    $schedule[$time]['Tuesday']->section->id,
    $schedule[$time]['Tuesday']->day,
    $schedule[$time]['Tuesday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Tuesday']->section->name }}<br>
                                    {{ $schedule[$time]['Tuesday']->class_name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (isset($schedule[$time]['Wednesday']))
                                <a href="{{ route('class_absence', [
    $schedule[$time]['Wednesday']->section->id,
    $schedule[$time]['Wednesday']->day,
    $schedule[$time]['Wednesday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Wednesday']->section->name }}<br>
                                    {{ $schedule[$time]['Wednesday']->class_name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (isset($schedule[$time]['Thursday']))
                                <a href="{{ route('class_absence', [
    $schedule[$time]['Thursday']->section->id,
    $schedule[$time]['Thursday']->day,
    $schedule[$time]['Thursday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Thursday']->section->name }}<br>
                                    {{ $schedule[$time]['Thursday']->class_name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (isset($schedule[$time]['Friday']))
                                <a href="{{ route('class_absence', [
    $schedule[$time]['Friday']->section->id,
    $schedule[$time]['Friday']->day,
    $schedule[$time]['Friday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Friday']->section->name }}<br>
                                    {{ $schedule[$time]['Friday']->class_name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if (isset($schedule[$time]['Saturday']))
                            <a href="{{ route('class_absence', [
    $schedule[$time]['Saturday']->section->id,
    $schedule[$time]['Saturday']->day,
    $schedule[$time]['Saturday']->timing
]) }}" class="clickable-class">
                                    {{ $schedule[$time]['Saturday']->section->name }}<br>
                                    {{ $schedule[$time]['Saturday']->class_name }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
