<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Password</title>
    <link href="{{asset('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> 
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-12  text-center">
                
            <p class="text-sm">Your Password is:  <a href="#" class="small">{{ $get_password }}</a></p>

            

        </div>
    </div>
</div>
  </body>
</html>