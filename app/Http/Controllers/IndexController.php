<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class IndexController extends Controller
{
    public function indexPage()
    {
    	return view('admin_login');
    }

    public function showPasssword()
    {
    	$decrypt= Crypt::encryptString('$2y$10$HrPDOLKt5ZSOVovd0mdwO.ZAtncNbVqrjYrO14YIXftPIkCJYO/7W');
         print_r($decrypt);
    }
}
