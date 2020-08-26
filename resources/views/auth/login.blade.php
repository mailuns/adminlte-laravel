<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Sebumi | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/css/skin-blue.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="javascript:;"><b>Sebumi</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
        <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
        <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    


  </div>
  <!-- /.login-box-body -->
</div>



<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script>
    var AdminLTEOptions = {
        //Enable sidebar expand on hover effect for sidebar mini
        //This option is forced to true if both the fixed layout and sidebar mini
        //are used together
        sidebarExpandOnHover: true,
        //BoxRefresh Plugin
        enableBoxRefresh: true,
        //Bootstrap.js tooltip
        enableBSToppltip: true
    };
</script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js') }}" type="text/javascript"></script>

@yield('js-script')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>