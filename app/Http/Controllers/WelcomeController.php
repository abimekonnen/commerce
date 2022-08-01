<?php

namespace App\Http\Controllers;
use \Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\category;
use App\Models\productTyp;
use App\Models\City;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::simplePaginate(12);
        //limit(3)
        $count = product::all()->count();
        $half = floor($count/2);
        $products1 = Product::orderBy('created_at','DESC','view','DESC')->get();
        //$products2 = Product::orderBy('created_at','DESC')->limit($half)->get();
        $products = $products1 ;
        //$test1 =  $products->toArray();
        //$test = json_decode($products,true);
        //dd($products1);
        $categories = Category::select('name')->get();
        $types = ProductTyp::select('name','category')->get();
        $cities = City::select('name')->get();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }
    public function getType($qr)
    {
        $products = Product::where('type','LIKE', "%{$qr}%")->simplePaginate(12);
        $categories = Category::select('name')->get();
        $types = ProductTyp::select('name','category')->get();
        $cities = City::select('name')->get();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
            'cities' => $cities,
        ]);
    }
    public function getCategory($qr)
    {
        $products = Product::where('category','LIKE', "%{$qr}%")->simplePaginate(12);
        $categories = Category::select('name')->get();
        $types = ProductTyp::select('name','category')->get();
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
        $city = request()->input('city');
        $products = Product::where('category','LIKE',"%{$category}%")
        ->where('type','LIKE',"%{$type}%")
        ->where('name','LIKE',"%{$name}%")
        ->where('city','LIKE',"%{$city}%")
        // ->where('model','LIKE',"%{$name}%")
        // ->where('description','LIKE',"%{$name}%")
        ->simplePaginate(12);
        $types = ProductTyp::select('name','category')->get();
        $categories = Category::select('name')->get();
        $cities = City::select('name')->get();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
            'cities' => $cities,
        ]); 
    } 
    public function checkOut($id)
    {   
        $viewData = Product::select('view')->where('id',$id)->first();
        $view = $viewData->view + 1;
        DB::table('products')->where('id',$id)->update(['view' => $view]);
        $product = Product::where('id', $id)->first();
        $similarProducts = Product::where('type', 'LIKE', "%{$product->type}%" )
        ->orwhere('category','LIKE',"%{$product->category}%")
        ->orwhere('name','LIKE',"%{$product->name}%")
        ->orwhere('model','LIKE',"%{$product->model}%")
        ->simplePaginate(12);
        $user = User::select('name','phone_1','phone_2','address','city')->where('id', $product->user_id)->first();
        $types = ProductTyp::select('name','category')->get();
        $categories = Category::select('name')->get();
        return view('singleProduct',[
            'product' => $product,
            'similarProducts' => $similarProducts,
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
