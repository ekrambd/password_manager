<?php
 use App\Models\Category;
 use App\Models\GenerateKey;
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

 function generateKey($key)
 {
 	  $generat_key = GenerateKey::findorfail(1);
 	  if($generat_key == NULL)
 	  {
 	  	$generat_key->generate_key = $key;
 	     $generat_key->update();
 	  }
 	  
 }

 function getKey()
 {
 	 $key = GenerateKey::findorfail(1);
 	 return $key;
 }