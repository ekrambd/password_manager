<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Password;
use Auth;
use PragmaRX\Google2FA\Google2FA;

class AjaxController extends Controller
{
    public function setupAuthenticator(Request $request)
    {
    	try
    	{
    			$google2fa = app('pragmarx.google2fa');
         
                 $key = getKey()->generate_key;

                 generateKey($key);
            
		        $QR_Image = $google2fa->getQRCodeInline(
		            'PasswordManager',
		             Auth::user()->email,
		             $key
              );
        
   
         return view('ajax.qr_code', ['QR_Image' => $QR_Image, 'secret' => $key]);
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function twofaVerify(Request $request)
    {
        try
        {
            $google2fa = new Google2FA();
            $key = getKey()->generate_key;
            if ($google2fa->verifyKey($key, $request->one_time_password)) 
            {
                return response()->json('valid');
            }else{
                return response()->json('Invalid');
            }
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
