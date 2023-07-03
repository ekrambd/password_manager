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
    
}
