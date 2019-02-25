<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\ProductResource;
use App\Http\Resources\TaskResource;
use App\Image;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nexmo\Response;
use validator;
class TaskController extends Controller
{

    public function getCategory(){
       $categoryName=DB::table('categories')->get();
       return view('taskView.inserData' ,compact('categoryName'));
    }


    public function insertProduct(Request $request )
    {

        $this->validate($request,[
            'product_name'=>'required|string',
            'product_price'=>'required',
        ]);

        $categoryName=$request->category_name;
        $categoryId=DB::table('categories')->where('category_name','=',$categoryName)->get();
        $product = new Product();
        $product->id = $request->id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $images = new Image();
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $images->image_name = $name;
        }
        $images ->product_id = $request->id;

        foreach ($categoryId as $id)
            $product->category_id =  $id->id;




        $images->save();
        $product->save();
        return back();
        //return new ProductResource($product);
    }

    public function insertImage(Request $request){

        $this->validate($request,[
            'image_name'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        $images = new Image();
        if ($request->hasFile('image_name')) {
            $image = $request->file('image_name');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $images->image_name = $name;
        }
        $images->save();
        return redirect('taskView.show');

    }


    public function showProduct(){

    }
}
