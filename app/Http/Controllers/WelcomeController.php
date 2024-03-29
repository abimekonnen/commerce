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
        //$count = product::all()->count();
        //$half = floor($count/2);
        $products1 = Product::select('id','name','city','price','model','image_1')->orderBy('created_at','DESC','view','DESC')->simplePaginate(12);
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
        $products = Product::where('type','LIKE', "%{$qr}%")->orderBy('created_at','DESC','view','DESC')->simplePaginate(12);
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
        $products = Product::where('category','LIKE', "%{$qr}%")->orderBy('created_at','DESC','view','DESC')->simplePaginate(12);
        $categories = Category::select('name')->get();
        $types = ProductTyp::select('name','category')->get();
        return view('welcome',[
            'products' => $products,
            'types' => $types,
            'categories' => $categories,
        ]);
    }
    public function getSearch(Request $request)
    {
        $output="";
        $products;
        $name = $request->query1;
        if($name){
            $results = Product::where('name','LIKE',"%{$name}%")
            ->orderBy('created_at','DESC','view','DESC')
            ->get();
                $output .=
                '
                    <ul class="dropdown-menu" style="display:block; position:relative">
                ';
            foreach($results as $result){
                $output .='<li clss="searchRecomendations" ><a class="dropdown-item"  href="#" style="color: black;">'.$result->name.'</a></li>';
            }
            $output.=
            '
                </ul>
            ';
            echo $output;
        }

    } 
    public function getSearch2(Request $request)
    {
        $output="";
        $products;
        $category = $request->category1;
        $type = $request->type1;
        $name = $request->query1;
        $city = $request->city1;
        if($category == 'all') $category = "";
        if($type == 'all') $type = "";
        if($city == 'all') $city = "";
        $products = Product::where('category', 'LIKE',"%{$category}%")
        ->where('type', 'LIKE',"%{$type}%")
        ->where('city', 'LIKE',"%{$city}%")
        ->where('name','LIKE',"%{$name}%")
        // ->where('model','LIKE',"%{$name}%")
        // ->where('category', 'LIKE',"%{$name}%")
        // ->where('type','LIKE',"%{$name}%")
        ->orderBy('created_at','DESC','view','DESC')
        ->get();
       // $products = $products->reverse();
       if(!$products->isEmpty()){
        foreach($products as $product){
            $output.=
            '
            <div class="col-md-6 col-xl-3">
            <div class="product-3 mb-2">
              <div class="product-media">
                <span class="badge badge-pill badge-success badge-pos-left">'. $product->name. '</span>
                <span class="badge badge-pill badge-primary badge-pos-right">
                <svg class="icon">
                  <use xlink:href="'. asset('icons/coreui.svg#cil-location-pin') .'"></use>
                </svg>
                '.$product->city .' 
                </span>
                <div class="slider-dots-fill-primary text-cente" data-provide="slider" data-dots="true">
                  <a href="'. route('checkout',$product->id) .'">
                    <img src="'.url('images/'.$product->image_1).'" alt="product">
                  </a>
                </div>
              </div>
              <div class="product-detail">
                <h6><a href="'. route('checkout',$product->id) .'">'. $product->model . '</a></h6>
                <div class="product-price">'. $product->price .' Birr</div>
              </div>
            </div>
          </div> 
            ';
            
        }
       }else{
        $output.=
        '<h1 class="text-center"> No Product found</h1>';  
       }

        return response($output);

    } 
    public function checkOut($id)
    {   
        $viewData = Product::select('view')->where('id',$id)->first();
        $view = $viewData->view + 1;
        DB::table('products')->where('id',$id)->update(['view' => $view]);
        $product = Product::where('id', $id)->first();
        $similarProducts = Product::select('id','name','city','price','model','image_1')->where('type', 'LIKE', "%{$product->type}%" )
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
