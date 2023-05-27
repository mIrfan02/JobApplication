<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
</head>
<body>
    @if ($message = Session::get('error'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

    <div class="container">
        <form class="login-form" action="{{url('/login')}}" method="post">
            @csrf
            <h2>Admin Login</h2>
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="email" id="email" name="email" required  autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required  autocomplete="new-password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
