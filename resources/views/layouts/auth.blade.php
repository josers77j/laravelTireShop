
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRM</title>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/plugins/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
 

@yield('content')
  </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- jQuery -->
    <script src="{{ asset('js/plugins/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/plugins/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js')}}"></script>
</body>
</html>