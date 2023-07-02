<?php
 use App\Models\Category;

 function categories()
 {
 	 $categories = Category::orderBy('id','DESC')->get();
 	 return $categories;
 }