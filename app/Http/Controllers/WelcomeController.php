<?php

namespace App\Http\Controllers;
use \Illuminate\Pagination\Paginator;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\category;
use App\Models\productTyp;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
  
    }
    public function getType($qr)
    {

        $products = Product::where('type','LIKE', "%{$qr}%")->get();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
  
    }
    public function getCategory($qr)
    {
        $products = Product::where('category','LIKE', "%{$qr}%")->get();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
  
    }
    public function getSearch()
    {
        $category = request()->input('category');
        $type = request()->input('type');
        $name = request()->input('name');
        $products = Product::where('name','LIKE', "%{$name}%")->get();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
  
    }
    
    public function checkOut($id)
    {
        $product = Product::where('id', $id)->first();
        $similaPproducts = Product::where('type', 'LIKE', "%{$product->type}%" )->get();
        //dd($similaPproducts);
        $user = User::select('phone_1','phone_2','address')->where('id', $product->user_id)->first();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('singleProduct',[
            'product' => $product,
            'similaPproducts' => $similaPproducts,
            'types' => $types,
            'categories' => $categories,
            'user' => $user,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
