<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Condition;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTyp;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use File;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function fetchData($categoryName)
    {

        $data = ProductTyp::where('category',$categoryName )->get();
        echo json_encode($data);
       
    }
    public function getType($categoryName)
    {
      
        $data = ProductTyp::where('category',$categoryName )->get();
        echo json_encode($data);
       
    }


    public function index()
    {
      $user_id = Auth::user()->id;
      $products = Product::where('user_id',$user_id)->get();
      $types= ProductTyp::all();
      $categories= Category::all();
      return view('product.view',[
        'products' => $products,
        'types' => $types,
        'categories' => $categories,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions= Condition::all();
        $types= ProductTyp::all();
        $categories= Category::all();
        return view('product.add',
        [
            'conditions' => $conditions,
            'types' => $types,
            'categories' => $categories,
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user_id = Auth::user()->id;
        $city  = User::select('city')->where('id',$user_id)->limit(1)->get();
        $city  = $city[0]->city;
        $request->validate([
            'name' =>'required',
            'model' =>'required',
            'price' =>'required|numeric',
            'condition'=> 'required',
            'category'=> 'required',
            'type'=> 'required',
            'picture_one' => 'mimes:jpg,jpeg,png|max:81048',
            'picture_two' => 'mimes:jpg,jpeg,png|max:81048',
            'picture_three' => 'mimes:jpg,jpeg,png|max:81048',
          
        ]);
        $request->name = str_replace(' ', '', $request->name);
        if($request->picture_one){
            $image = $request->picture_one;
            $newPictureOneName = '1'.'-'.time().'-'. $request->name.'.'.$image->extension();
            $destination1 = public_path('images/').$newPictureOneName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination1);

        }else{
            $newPictureOneName = null;
        }
        if($request->picture_two){
            $image = $request->picture_two;
            $newPictureTwoName = '2'.'-'.time().'-'. $request->name.'.'.$image->extension();
            $destination2 = public_path('images/').$newPictureTwoName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination2);
        }else{
            $newPictureTwoName = null;
        }
        if($request->picture_three){
            $image = $request->picture_three;
            $newPictureThreeName = '3'.'-'.time().'-'.$request->name.'.'.$image->extension();
            $destination3 = public_path('images/').$newPictureThreeName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination3);
        }else{
            $newPictureThreeName = null;
        }

        $product = Product::Create(
            [
                'name' => $request->input('name'),
                'model'=> $request->input('model'),
                'price'=> $request->input('price'),
                'condition'=>$request->input('condition'),
                'category'=> $request->input('category'),
                'type'=> $request->input('type'),
                'description'=> $request->description,
                'image_1' =>$newPictureOneName,
                'image_2' =>$newPictureTwoName,
                'image_3' =>$newPictureThreeName,
                'user_id' =>$user_id,
                'city' => $city,
            ]
        );

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $products  = Product::where('id',$id)->get();
        $productI  = Product::select('id')->where('id',$id)->limit(1)->get();
        $categories= Category::all();
        $conditions= Condition::all();
        $productId = $productI[0]->id;
        // dd($productId[0]->id);
        return view('product.edit',[
            'products'=>$products,
            'categories'=>$categories,
            'conditions'=>$conditions,
            'productId'=>$productId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        //dd($user);
        $request->validate([
            'name' =>'required',
            'model' =>'required',
            'price' =>'required|numeric',
            'condition'=> 'required',
            'category'=> 'required',
            'type'=> 'required',
            'picture_one' => 'mimes:jpg,jpeg,png|max:81048',
            'picture_two' => 'mimes:jpg,jpeg,png|max:81048',
            'picture_three' => 'mimes:jpg,jpeg,png|max:81048',
          
        ]);
        $nameImg = str_replace(' ', '', $request->name);
        //dd($id);
        if($request->picture_one){
            $image = $request->picture_one;
            $newPictureOneName = '1'.'-'.time().'-'. $nameImg.'.'.$image->extension();
            $destination1 = public_path('images/').$newPictureOneName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination1);

            $deletedImage = $productI  = Product::select('image_1')->where('id',$id)->get();

            DB::table('products')
            ->where('id', $id)
            ->update(['image_1' => $newPictureOneName]);

            File::delete(public_path('images'.   $deletedImage[0]->image_1));
        }
        if($request->picture_two){
            $image = $request->picture_two;
            $newPictureTwoName = '2'.'-'.time().'-'.  $nameImg.'.'.$image->extension();
            $destination2 = public_path('images/').$newPictureTwoName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination2);

            $deletedImage = $productI  = Product::select('image_1')->where('id',$id)->get();
         
            DB::table('products')
            ->where('id', $id)
            ->update(['image_2' => $newPictureTwoName]);

            File::delete(public_path('images'.   $deletedImage[0]->image_1));
        }
        if($request->picture_three){
            $image = $request->picture_three;
            $newPictureThreeName = '3'.'-'.time().'-'. $nameImg.'.'.$image->extension();
            $destination3 = public_path('images/').$newPictureThreeName;
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination3);

            $deletedImage = $productI  = Product::select('image_1')->where('id',$id)->get();

            DB::table('products')
            ->where('id', $id)
            ->update(['image_3' => $newPictureThreeName]);

            File::delete(public_path('images'.   $deletedImage[0]->image_1));
        }
        $products = Product::where('id',$id)->update(
            [
            'name' => $request->name,
            'model' => $request->model,
            'price' => $request->price,
            'condition'=> $request->condition,
            'category'=> $request->category,
            'type'=> $request->type,
            'description'=> $request->description,
            ]
        );

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        File::delete(public_path('images/'. $product->image_1));
        File::delete(public_path('images/'. $product->image_2));
        File::delete(public_path('images/'. $product->image_3));
        $product->Delete();
        return redirect(route('product.index'));
    }
}
