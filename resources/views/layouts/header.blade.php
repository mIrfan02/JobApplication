<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> @yield('title') </title>
  <!-- plugins:css -->
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href=" https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href=" https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
{{-- font awesome cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
{{-- end cdn --}}



    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
  <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css' ) }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('css/dasboard.css')}}">

  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" />

 
</head>
<body>
  
  @if(session('messageSuccess'))
  <div id="customAlert" class="alert alert-success">
      {{ session('messageSuccess') }}
  </div>
@endif


  @if(Session::has('deletion'))
  <div id="alertMessage" class="alert alert-success center">
   <p class="success-font">{{ Session::get('deletion') }} </p>
   
    </div>
@endif

  @if(Session::has('message'))
  <div id="alertMessage" class="alert alert-success center">
   <p class="success-font">{{ Session::get('message') }} </p>
   
    </div>
@endif

{{-- <div id="customModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="Emailclose()">&times;</span>
    <form id="messageForm">
      <input type="text" name="user_id" id="user_id" >
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4"></textarea>
      <button type="submit">Submit</button>
    </form>
  </div>
</div> --}}

<div id="MsgModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Send Message</h5>
              <button type="button" id="close" class="close" data-dismiss="modal" onclick="MsgAllclose()">&times;</button>
          </div>
          <div class="modal-body">
              <form action="{{route('messagetoAll')}}" method="POST">
                  @csrf
                  
                
                <div>
                  <label for="message"> Message :</label>
                  <textarea type="text" id="message" name="message" class="form-control" rows="4"></textarea>
                </div>
                  <button type="submit" class="btn btn-primary">Message To All</button>
              </form>
          </div>
      </div>
  </div>
</div>



<div id="customModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Send Message</h5>
              <button type="button" id="close" class="close" data-dismiss="modal" onclick="Emailclose()">&times;</button>
          </div>
          <div class="modal-body">
              <form action="{{route('message')}}" method="POST">
                  @csrf
                  <div>
                  <input type="text" id="user_id" name="user_id" class="form-control" hidden >
                </div>
                
                <div>
                  <label for="message"> Message :</label>
                  <textarea type="text" id="message" name="message" class="form-control" rows="4" ></textarea>
                </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
              </form>
          </div>
      </div>
  </div>
</div>



  <div id="email-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Email</h5>
                <button type="button" id="close" class="close" data-dismiss="modal" onclick="modelclose()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="/send-email" method="POST">
                    @csrf
                    <div>
                    <input type="email" id="recipient-email" name="recipient_email" class="form-control" required>
                  </div>
                  <div>
                    <input type="text" id="subject" name="subject" class="form-control" required placeholder="subject of email">
                  </div>
                  <div>
                    <input type="text" id="body" name="body" class="form-control" required  placeholder="Body of Email">
                  </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>



  <div class="container-scroller">
   
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="{{route('admin_dashboard')}}"><img src="{{asset('images/alrighttech 1.png')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{route('admin_dashboard')}}"><img src="{{asset('images/alrighttech 1.png')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <form action="  " >
              
              <input type="text" class="form-control" placeholder="Search now" name="query" aria-label="search" aria-describedby="search">
            {{-- <button type="submit" >Search</button> --}}
            </form>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-1">
           
          
          </li>
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('images/alrighttech 1.png')}}" alt="profile"/>
              <span class="nav-profile-name"> {{ session('super_admin_name') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit">Logout</button>
              </form>
              
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>

    