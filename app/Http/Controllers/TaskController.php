<?php

namespace App\Http\Controllers;

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


    public function insertProduct(Request $request)
    {

        $this->validate($request,[
            'product_name'=>'required|string',
            'product_price'=>'required',
        ]);

        //dd($request);
        $categoryName=$request->category_name;
        $categoryId=DB::table('categories')->where('category_name','=',$categoryName)->get();
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;

        foreach ($categoryId as $id)
            $product->category_id =  $id->id;

        $product->save();
        return back();
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
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select( 'categories.id', 'categories.category_name' , 'products.id'
                , 'products.product_name' , 'products.product_price')->get();
        return new TaskResource($products);

       // return Response::json($products);
    }
}
