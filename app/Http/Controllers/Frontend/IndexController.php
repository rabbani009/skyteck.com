<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg; 

class IndexController extends Controller
{


    public function index(){


		$products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
		$sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
		$categories = Category::orderBy('category_name_en','ASC')->get();
		$featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
		$hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
		$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
		$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();



        return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals'));

    }

    public function UserLogout(){

        Auth::logout();
        return Redirect()->route('login');


    }

    public function UserProfile(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user'));
    }//end method

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
 

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);

    } // end method 



	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);

		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_ban = $product->product_color_hin;
		$product_color_ban = explode(',', $color_ban);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_ban = $product->product_size_ban;
		$product_size_ban = explode(',', $size_ban);

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('frontend.product.product_details',compact('product','multiImag','product_color_en','product_color_ban','product_size_en','product_size_ban','relatedProduct'));

	}








   
}
