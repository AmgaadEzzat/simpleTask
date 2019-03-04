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

    public function showInsertDataViewBlade(){
       return view('taskView.inserData' );
    }


    public function insertProduct(Request $request )
    {

        $this->validate($request,[
            'product_name'=>'required|string',
            'product_price'=>'required',
        ]);

        $category = new Category();
        $category ->category_name = $request->category_name;
        $category->save();

        $product = new Product();
        $product-> product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product-> category_id = $category->id;
        $product->save();

        $image = new Image();
        if ($request->hasFile('photos')){
        foreach ($request->file('photos') as $file) {
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $name);
            $photos[] = $name;

            $image->product_id = $product->id;
            $image->image_name = json_encode($photos);
            $image->save();
        }

        return back();

    }}

}
