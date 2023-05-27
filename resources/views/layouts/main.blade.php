@include('layouts.header')
    <!-- partial -->
    @php
    $pending =  \App\Models\Job::where('app_status','pending')->where('hiring','rejected')->where('emp_status','no')->get()->count();
    $shortlisted  =  \App\Models\Job::where('app_status', 'shortlisted')
                ->where('hiring', 'rejected')
                ->where('emp_status','no')->get()->count();
    $hired  =  \App\Models\Job::where('emp_status','internship')->get()->count();
    $web  =  \App\Models\Job::where('role', 'Web Development')->where('emp_status','job')->get()->count();
    $app  =  \App\Models\Job::where('role', 'App Development')->where('emp_status','job')->get()->count();
    $hr  = \App\Models\Job::where('role', 'HR / Management') ->where('emp_status','job')->get()->count();
    $quality  = \App\Models\Job::where('role', 'Quality Assurance') ->where('emp_status','job')->get()->count();
    $marketing  =\App\Models\Job::where('role', 'Marketing')->where('emp_status','job')->get()->count();
    $finance  =\App\Models\Job::where('role', 'Commerce / Finance')->where('emp_status','job')->get()->count();
    $project  =\App\Models\Job::where('role', 'Project Management')->where('emp_status','job')->get()->count();
    $other  =\App\Models\Job::where('role', 'Other')->where('emp_status','job')->get()->count();



    @endphp

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin_dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard </span><span class="text-danger  count"><strong><sup>{{$pending}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            
            <a class="nav-link" href="{{ route('shortlisted') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Shortlisted</span><span class="text-danger count"><strong><sup>{{$shortlisted}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('hiring')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Hired</span><span class="text-danger count"><strong><sup>{{$hired}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('webDev')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Web Development</span><span class="text-danger count"><strong><sup>{{$web}}</sup></strong> </span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('AppDev')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">App-development</span><span class="text-danger count"><strong><sup>{{$app}}</sup></strong> </span>
            </a>
          </li>
         
        

          <li class="nav-item">
            <a class="nav-link" href="{{route('hr-manage')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">HR Management</span><span class="text-danger count"><strong><sup>{{$hr}}</sup></strong> </span>
            </a>
          </li>

          
          <li class="nav-item">
            <a class="nav-link" href="{{route('quality')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Quality Assurance</span><span class="text-danger count"><strong><sup>{{$quality}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('marketing')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Marketing</span><span class="text-danger count"><strong><sup>{{$marketing}}</sup></strong> </span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('commerce')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Commerce</span><span class="text-danger count"><strong><sup>{{$finance}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('project')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Project-Management</span><span class="text-danger count"><strong><sup>{{$project}}</sup></strong> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('other')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Other-Management</span><span class="text-danger count"><strong><sup>{{$other}}</sup></strong> </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('categorie')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>


        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="me-md-3 me-xl-5">
                    <h2>Welcome {{ session('super_admin_name') }}</h2>
                    <p class="mb-md-0">To Admin Dashboard</p>
                  </div>
                 
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  
                  <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                  </button>
                  <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
                    <i class="mdi mdi-plus text-muted"></i>
                  </button>
                  <a href="{{ route('export') }}" >  <button class="btn btn-primary  mt-2 mt-xl-0"> EXport Data </button> </a>
                
                  <form action="{{ route('delete.expired.messages') }}" method="POST" class="ml-left">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete Expired Messages</button>
                </form>

                <button id="MsgModalBtn" class="ml-left" onclick="MessageToAll()"  >Message To All</button>

                </div>
              </div>
            </div>
          </div>
         
          <main>
            @yield('content')
        </main>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
@include('layouts.footer')