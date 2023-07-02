<?php
 use App\Models\Category;
 use Illuminate\Http\Request;
 function categories()
 {
 	 $categories = Category::orderBy('id','DESC')->get();
 	 return $categories;
 }

 function storeCategories(Request $request, $password)
 {
 	  for($count=0; $count < count($request->category_id); $count++)
        {
           $data_var = array(
              'password_id' => $password->id,
              'category_id' => $request->category_id[$count],
           );
           $insert_data[] = $data_var;
            
        }
       
      DB::table('category_password')->insert($insert_data);

 }