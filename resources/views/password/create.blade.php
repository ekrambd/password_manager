@extends('admin_master')
@section('content')
 
 <div class="container-fluid" id="container-wrapper">
   
   <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Password</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
   </div>

   <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Password</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('password.store')}}" method="POST">
                  	@csrf

                  	<div class="row">
                  	  <div class="col-md-7 col-sm-12">
                  	  	<div class="form-group">
		                      <label for="title">Title <span class="required">*</span></label>
		                      <input type="text" class="form-control" name="title" id="title" aria-describedby="title"
		                        placeholder="Title" value="{{old('title')}}" required="">
		                     @error('title')
		                       <p class="alert alert-danger">{{ $message }}</p>
		                     @enderror
		                 </div>

		                 <div class="form-group">
		                      <label for="user_name">User ID / User Name / Email / Phone  <span class="required">*</span></label>
		                      <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="user_name"
		                        placeholder="User ID / User Name / Email / Phone" value="{{old('user_name')}}" required="">
		                     @error('user_name')
		                       <p class="alert alert-danger">{{ $message }}</p>
		                     @enderror
		                 </div>

		                 <div class="form-group">
		                      <label for="password">Password  <span class="required">*</span></label>
		                      <input type="password" class="form-control password" name="password" id="password" aria-describedby="password"
		                        placeholder="Password" value="{{old('password')}}" required="">

                            <div id="pwd_strength_wrap">
                              <div id="passwordDescription">Password not entered</div>
                              <div id="passwordStrength" class="strength0"></div>
                              
                            </div><!-- END pwd_strength_wrap -->
		                     @error('password')
		                       <p class="alert alert-danger">{{ $message }}</p>
		                     @enderror
		                 </div>
                  	  </div>

                  	  <div class="col-md-5 col-sm-12">
                  	  	<div class="form-group">
                  	  	  <div class="card">
                  	  	  	<div class="card-header bg-primary">
                  	  	  	   <h5 class="text-white text-center">Select categories <span class="required">*</span></h5>
                  	  	  	</div>

                  	  	  	<div class="card-body">
                  	  	  	  
                  	  	  	    <div class="row">
                  	  	  	     @foreach(categories() as $category)
                  	  	  	      <div class="col-md-6">
                  	  	  	      	<input type="checkbox" name="category_id[]" id="{{$category->id}}" value="{{$category->id}}">

	                  	  	  	     <label for="{{$category->id}}" class="small">{{$category->category_name}}</label>
                  	  	  	      </div>
                  	  	  	     @endforeach
                                  @error('category_id')
                           <p class="alert alert-danger">{{ $message }}</p>
                         @enderror
                  	  	  	    </div>
                  	  	  	   
                  	  	  	</div>
                  	  	  </div>
                  	  	</div>
                  	  </div>
                  	</div>
                    
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

 </div>
@endsection

