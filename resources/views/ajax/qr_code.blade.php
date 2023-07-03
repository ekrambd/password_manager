<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Authenticator</title>
    <link href="{{asset('back/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> 
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-md-12  text-center">
                
            <p>Set up your two factor authentication by scanning the barcode below. @if(Auth::user()->is_authencticator == 0)Alternatively, you can use the code <strong>{{ $secret }}</strong></p>
            
            <div>
                {!! $QR_Image !!}
            </div>
            @endif 
            <form id="2fa-submit">
             <input type="hidden" name="password_id" class="password_id" value="">
            <div class="form-group">
              <label for="2fa_code"><strong>Confirm Two-Factor Authenticator Code</strong></label>
              <input type="text" class="form-control 2fa_code" id="2fa_code" placeholder="2FA Code"  required="">
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit code</button>
            </div>

        </div>
    </div>
</div>
  </body>
</html>