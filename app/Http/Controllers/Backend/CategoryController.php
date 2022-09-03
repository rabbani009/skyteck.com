<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){

    	$category = Category::latest()->get();
    	return view('backend.category.category_view',compact('category'));

    }//end method

    public function CategoryStore(Request $request){

        $request->validate([
             'category_name_en' => 'required',
             'category_name_ban' => 'required',
          
         ],[
             'category_name_en.required' => 'Input Category English Name',
             'category_name_ban.required' => 'Input Category Bangla Name',
         ]);
 
          
 
     Category::insert([
         'category_name_en' => $request->category_name_en,
         'category_name_ban' => $request->category_name_ban,
         'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
         'category_slug_ban' => str_replace(' ', '-',$request->category_name_ban),
        
 
         ]);
 
         $notification = array(
             'message' => 'Category Inserted Successfully',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method 

     public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('backend.category.category_edit',compact('category'));

    }

    public function CategoryUpdate(Request $request ,$id){

    	 

        Category::findOrFail($id)->update([
          'category_name_en' => $request->category_name_en,
          'category_name_ban' => $request->category_name_ban,
          'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
          'category_slug_ban' => str_replace(' ', '-',$request->category_name_ban),
        
  
          ]);
  
          $notification = array(
              'message' => 'Category Updated Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('all.category')->with($notification);
  
  
      } // end method

      public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 












}
