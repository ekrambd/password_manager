<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use App\Http\Requests\StorePasswordRequest; 
use DataTables;
use Illuminate\Support\Facades\Crypt;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth_check');
    }
    
    public function index(Request $request)
    {
        try
        {
            if($request->ajax())
            {
                $passwords = Password::latest()->select('*');
                    return Datatables::of($passwords)
                            ->addIndexColumn()
                            ->addColumn('show_password', function($row){

                                return '<a href="#" class="badge badge-info p-2 show-password" data-id="'.$row->id.'">Show password</a>';

                            })
                            ->addColumn('action', function($row){

                                $btn = '';
                                 

                                $btn .= ' <a href="'.route('password.show',$row->id).'" class="btn btn-primary btn-sm action-button">Edit</a>';

                                

                                  $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-password action-button" data-id="'.$row->id.'">Delete</a>'; 
            
                                    return $btn;
                            })
                            ->rawColumns(['action', 'show_password'])
                            ->make(true); 
                }
            
            return view('password.index');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('password.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasswordRequest $request)
    {
        try
        {
            $password = new Password();
            $password->title = $request->title;
            $password->user_name = $request->user_name;
            $password->encrypt_password = Crypt::encrypt($request->password);
            $password->save();

            storeCategories($request, $password);

            $notification=array(
                             'messege'=>'Successfully password has been added',
                             'alert-type'=>'success'
                            );

                   return redirect()->back()->with($notification);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        try
        {
            $password->delete();
            return response()->json('Successfully password has been deleted');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
