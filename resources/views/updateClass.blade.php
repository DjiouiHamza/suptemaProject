
@include('layouts.header')

<head>
<!-- <img src="{{ asset('upload/test.png') }}" > -->


    <!-- Fonts -->
    <link rel="stylesheet" href={{ asset('css/style.css')}}> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>


@if (session('updated'))
    <div class="alert alert-success">
        {{ session('updated') }}
    </div>
@endif


<form method="POST" class="row gy-2 gx-3 align-items-center" action="{{ route('class_update', $classes->id) }}">
    @method('put')
    @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
  <div class="col-auto">
    <div data-mdb-input-init class="form-outline">
      <input type="text" name="class_Name"  class="form-control" placeholder="name" value="{{$classes->name}}" />
    </div>
  </div>

  </div>


  
  <div class="col-auto">
    <input data-mdb-ripple-init type="submit" class="btn btn-primary" value="update ">
  </div>
</form>