{!!View::make('home::login.header')!!}

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{!!url()!!}/packages/tugumuda/images/iconaza.png" width="200px"><br>
    <a href="{!!url()!!}"><b>absensi</b>Poltekkes</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
    <center style="margin-top: -20px"><h3><b>Log In</b></h3></center>

    {!!Form::open(array('url' => url().'/login','id'=>'tampil', 'method' => 'POST'))!!}
      <div class="form-group has-feedback">
        <input type="text" name='username' class="form-control" required placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name='password' class="form-control" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    {!!Form::close()!!}


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="{!!asset('packages/tugumuda/plugins/jQuery/jQuery-2.2.0.min.js')!!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!!asset('packages/tugumuda/js/bootstrap.min.js')!!}"></script>
<!-- iCheck -->
<script>
</script>
</body>
</html>
