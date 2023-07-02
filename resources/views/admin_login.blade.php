<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('back/img/logo/logo.png')}}" rel="icon">
  <title>Admin | Login</title>
  <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('back/css/ruang-admin.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('toastr/toastr.css')}}">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login m-auto pt-5">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="{{URL::to('admin-login')}}" method="POST">
                  	@csrf
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" required="">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" required="">
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{asset('back/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('back/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('back/js/ruang-admin.min.js')}}"></script>

  <script src="{{asset('toastr/toastr.js')}}"></script>
   @if(Session::has('messege'))
    @toastr("{{ Session::get('messege') }}")
  @endif

</body>

</html>