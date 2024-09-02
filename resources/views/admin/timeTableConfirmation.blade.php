@extends('layouts.app')

@php
$existingClassName = session('existing_class_name');
$existingSectionName = \App\Models\Section::find(session('existing_section_id'))->name;
$newClassName = session('new_class_name');
$newSectionName = \App\Models\Section::find(session('new_section_id'))->name;
@endphp

@section('content')
<div class="container">
    <div class="alert alert-warning">
        This timetable already exists with section: <strong>{{ $existingSectionName }}</strong> and class name: <strong>{{ $existingClassName }}</strong>.
        <br><br>
        Do you want to change it to section: <strong>{{ $newSectionName }}</strong> and class name: <strong>{{ $newClassName }}</strong>?
    </div>
    <form action="{{ route('timetable.updateExisting') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Yes, Update</button>
        <a href="{{ route('timetable.create') }}" class="btn btn-secondary">No, Cancel</a>
    </form>
</div>
@endsection
