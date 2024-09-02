<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="/home">
        <img
          src="{{ asset('upload/classic.png') }}"
          height="15"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      @if(Auth::check() && Auth::user()->isadmin)
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('classes_list') }}" onclick="event.preventDefault();
                                                     document.getElementById('classes_list').submit();">Sections List</a>
      <form id="classes_list" action="{{ route('classes_list') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('students_list') }}" onclick="event.preventDefault();
                                                     document.getElementById('students_list').submit();">Students List</a>
      <form id="students_list" action="{{ route('students_list') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('teachers_list') }}" onclick="event.preventDefault();
                                                     document.getElementById('teachers_list').submit();">Teachers List</a>
      <form id="teachers_list" action="{{ route('teachers_list') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('timetable.create') }}" onclick="event.preventDefault();
            document.getElementById('timetable.create').submit();">Time Table</a>
      <form id="timetable.create" action="{{ route('timetable.create') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
</li>

<li class="nav-item">
        <a class="nav-link" href="{{ route('class_absence_display') }}" onclick="event.preventDefault();
            document.getElementById('class_absence_display').submit();">Absence List</a>
      <form id="class_absence_display" action="{{ route('class_absence_display') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
</li>

      </ul>
        @elseif(Auth::check() && !Auth::user()->isadmin)
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('Classes') }}" onclick="event.preventDefault();
                                                     document.getElementById('Classes').submit();">Sections List</a>
      <form id="Classes" action="{{ route('Classes') }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('TimeTable', Auth::user()->id) }}" onclick="event.preventDefault();
                                                     document.getElementById('TimeTable').submit();">Time Table</a>
      <form id="TimeTable" action="{{ route('TimeTable', Auth::user()->id) }}" method="" class="d-none">
        @method('post')
        @csrf
      </form>
        </li>
      </ul>
      @endif
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      
      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form-header').submit();">logout</a>
      <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
        @method('post')
        @csrf
      </form>

      
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->